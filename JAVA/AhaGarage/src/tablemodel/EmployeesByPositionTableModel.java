/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tablemodel;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.Employee;

/**
 *
 * @author soto.aitzol
 */
public class EmployeesByPositionTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"EMPLOYEE ID", "NAME", "SURNAME", "AGE","SALARY"};
    ArrayList<Employee> employees = new ArrayList();
    
    public EmployeesByPositionTableModel(ArrayList<Employee> employees){
        this.employees = employees;
    }
    @Override
    public int getRowCount() {
        return employees.size();
    }
    
    @Override
    public String getColumnName(int columnIndex){
        return zutabeIzenak[columnIndex];
    }

    @Override
    public int getColumnCount() {
        return zutabeIzenak.length;
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        if(columnIndex == 0){
            return employees.get(rowIndex).getId();
        }else if (columnIndex == 1){
            return employees.get(rowIndex).getName();
        }else if (columnIndex == 2){
            return employees.get(rowIndex).getSurname();
        }else if (columnIndex == 3){
            return employees.get(rowIndex).getAge();
        }else if(columnIndex == 4){
            return employees.get(rowIndex).getSalary();
        }
        return null;
    }
}
