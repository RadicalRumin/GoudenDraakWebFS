<template>
    <div class="p-6 bg-gray-100 min-h-screen flex flex-col">
        <!-- Header with Week Selector & Save Button -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <label for="week" class="font-semibold text-gray-700">Select Week:</label>
                <input
                    id="week"
                    type="week"
                    v-model="selectedWeek"
                    @change="loadSchedule"
                    class="px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
            </div>
            <button
                @click="saveSchedule"
                class="px-6 py-2 bg-green-500 text-white font-bold rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
            >
                Save Schedule
            </button>
        </div>

        <!-- Tables Pool -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Available Tables</h3>
            <div class="flex gap-2 flex-wrap">
                <div
                    v-for="table in tables"
                    :key="table.id"
                    draggable="true"
                    @dragstart="dragStart($event, table)"
                    class="cursor-pointer px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors"
                >
                    Table {{ table.id }}
                </div>
            </div>
        </div>

        <!-- Week Layout -->
        <div class="grid grid-cols-7 gap-4">
            <div v-for="day in daysOfWeek" :key="day" class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold text-blue-600 mb-2 text-center">{{ day }}</h3>

                
                <div v-for="employee in employees" :key="employee.id" class="mb-4">
                    <div class="font-medium text-gray-800 mb-2">{{ employee.first_name }} {{ employee.last_name }}</div>
                    
                    
                    <div 
                        class="min-h-[50px] bg-gray-200 p-2 rounded-lg flex flex-wrap gap-2"
                        @dragover.prevent
                        @drop="drop($event, employee, day)"
                    >
                       
                        <div
                            v-for="table in getAssignedTables(employee.id, day)"
                            :key="table.id"
                            class="px-3 py-2 bg-blue-500 text-white rounded-lg shadow"
                        >
                            Table {{ table.id }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import { Employee } from "@/Models/employee";
import { Table } from "@/Models/table";
import { EmployeeTablePlan } from "@/Models/employeeTablePlan";

const selectedWeek = ref<string>(new Date().toISOString().slice(0, 10));
const employees = ref<Employee[]>([]);
const tables = ref<Table[]>([]);
const schedule = ref<EmployeeTablePlan[]>([]);

const daysOfWeek = computed(() => {
    const startDate = new Date(selectedWeek.value);
    const days: string[] = [];
    for (let i = 0; i < 7; i++) {
        const day = new Date(startDate);
        day.setDate(startDate.getDate() + i);
        days.push(day.toISOString().slice(0, 10));
    }
    return days;
});

const loadSchedule = async () => {
    router.get(
        "/schedule",
        { week: selectedWeek.value },
        {
            preserveState: true,
            onSuccess: (page) => {
                employees.value = page.props.employees as Employee[];
                tables.value = page.props.tables as Table[];
                schedule.value = page.props.schedule as EmployeeTablePlan[];
            },
        }
    );
};


const dragStart = (event: DragEvent, table: Table) => {
    if (!event.dataTransfer) return;
    event.dataTransfer.setData("table", JSON.stringify(table));
};


const drop = (event: DragEvent, employee: Employee, day: string) => {
    if (!event.dataTransfer) return;
    event.preventDefault();

    const droppedTable = JSON.parse(event.dataTransfer.getData("table")) as Table;

    // Ensure the table isn't already scheduled for this same day
    if (!schedule.value.find(entry => entry.table_id === droppedTable.id && entry.date === day)) {
        schedule.value.push({
            employee_id: employee.id,
            table_id: droppedTable.id,
            date: day,
        } as EmployeeTablePlan);
    }
};

// Retrieve tables assigned to a specific employee on a given day
const getAssignedTables = (employeeId: number, day: string) => {
    return schedule.value
        .filter(entry => entry.employee_id === employeeId && entry.date === day)
        .map(entry => tables.value.find(table => table.id === entry.table_id))
        .filter(Boolean) as Table[];
};

// Save the schedule
const saveSchedule = () => {
    router.post(
        "/schedule",
        { schedule: schedule.value },
        {
            onSuccess: () => alert("Schedule saved successfully!"),
            onError: () => alert("Failed to save schedule."),
        }
    );
};

onMounted(loadSchedule);
</script>
