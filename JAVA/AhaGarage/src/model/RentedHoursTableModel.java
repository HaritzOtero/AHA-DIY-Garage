/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author soto.aitzol
 */
public class RentedHoursTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"ID","NAME","SURNAME","RENTED HOURS"};
    ArrayList<Renting> rentedHours = new ArrayList();
    
    public RentedHoursTableModel(ArrayList<Renting> dOccupation){
        this.rentedHours = dOccupation;
    }
    @Override
    public int getRowCount() {
        return rentedHours.size();
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
            return rentedHours.get(rowIndex).getClient().getId();
        }else if (columnIndex == 1){
            return rentedHours.get(rowIndex).getClient().getName();
        }else if (columnIndex == 2){
            return rentedHours.get(rowIndex).getClient().getSurname();
        }else if (columnIndex == 3){
            return rentedHours.get(rowIndex).getHours();
        }
        return null;
    }
}
