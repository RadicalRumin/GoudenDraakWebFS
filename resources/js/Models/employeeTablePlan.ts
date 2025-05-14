import { Employee } from './employee';
import { Table } from './table';

export interface EmployeeTablePlan {
    id: number;
    employee_id: number;
    table_id: number;
    date: string;
    employee?: Employee; // Optional, if you want to include the employee relationship
    table?: Table; // Optional, if you want to include the table relationship
  }