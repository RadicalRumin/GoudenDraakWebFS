<template>
    <div>
        <div>
            <label for="week">Select Week:</label>
            <input type="week" v-model="selectedWeek" @change="loadSchedule" />
        </div>

        <div v-for="day in daysOfWeek" :key="day">
            <h3>{{ day }}</h3>
            <div v-for="employee in employees" :key="employee.id">
                <div>{{ employee.first_name }} {{ employee.last_name }}</div>
                <div
                    v-for="table in tables"
                    :key="table.id"
                    draggable="true"
                    @dragstart="dragStart($event, table, employee, day)"
                    @dragover.prevent
                    @drop="drop($event, table, employee, day)"
                >
                    {{ table.name }}
                </div>
            </div>
        </div>

        <button @click="saveSchedule">Save Schedule</button>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import { Employee } from "@/Models/employee";
import { Table } from "@/Models/table";
import { EmployeeTablePlan } from "@/Models/employeeTablePlan";

// Define reactive variables with explicit types
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

const dragStart = (event: DragEvent, table: Table, employee: Employee, day: string) => {
    if (!event.dataTransfer) {
        return;
    }   
    event.dataTransfer.setData("table", JSON.stringify(table));
    event.dataTransfer.setData("employee", JSON.stringify(employee));
    event.dataTransfer.setData("day", day);
};

const drop = (event: DragEvent, table: Table, employee: Employee, day: string) => {
    if (!event.dataTransfer) {
        return;
    }
    event.preventDefault();
    const droppedTable = JSON.parse(
        event.dataTransfer.getData("table")
    ) as Table;
    const droppedEmployee = JSON.parse(
        event.dataTransfer.getData("employee")
    ) as Employee;
    const droppedDay = event.dataTransfer.getData("day");

    const existingEntry = schedule.value.find(
        (entry) =>
            entry.table_id === droppedTable.id &&
            entry.employee_id === droppedEmployee.id &&
            entry.date === droppedDay
    );

    if (!existingEntry) {
        schedule.value.push({
            employee_id: droppedEmployee.id,
            table_id: droppedTable.id,
            date: droppedDay,
        } as EmployeeTablePlan);
    }
};

const saveSchedule = () => {
    router.post(
        "/schedule",
        { schedule: schedule.value },
        {
            onSuccess: () => {
                alert("Schedule saved successfully!");
            },
            onError: () => {
                alert("Failed to save schedule.");
            },
        }
    );
};

onMounted(() => {
    loadSchedule();
});
</script>
