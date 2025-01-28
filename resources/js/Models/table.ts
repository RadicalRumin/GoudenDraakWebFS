export interface Table {
    id: number;
    name: string; // Assuming the table has a 'name' property
    Customers?: any[]; // Optional, if you need to use this relationship
    Orders?: any[]; // Optional, if you need to use this relationship
  }