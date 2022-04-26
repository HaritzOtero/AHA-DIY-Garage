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
public class TotalRentedHoursByClientTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"CLIENT ID", "NAME", "RENTED HOURS", "INCOME"};
    ArrayList<Renting> occupation = new ArrayList();
    
    public TotalRentedHoursByClientTableModel(ArrayList<Renting> dOccupation){
        this.occupation = dOccupation;
    }
    @Override
    public int getRowCount() {
        return occupation.size();
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
            return occupation.get(rowIndex).getClient().getId();
        }else if (columnIndex == 1){
            return occupation.get(rowIndex).getClient().getName();
        }else if (columnIndex == 2){
            return occupation.get(rowIndex).getHours();
        }else if (columnIndex == 3){
            return occupation.get(rowIndex).getPrice();
        }
        return null;
    }
}
