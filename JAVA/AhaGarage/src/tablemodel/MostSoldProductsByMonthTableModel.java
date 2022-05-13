/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tablemodel;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.Selling;

/**
 *
 * @author soto.aitzol
 */
public class MostSoldProductsByMonthTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"PRODUCT ID", "NAME","AMOUNT SOLD","INCOME"};
    ArrayList<Selling> products = new ArrayList();
    
    public MostSoldProductsByMonthTableModel(ArrayList<Selling> products){
        this.products = products;
    }
    @Override
    public int getRowCount() {
        return products.size();
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
            return products.get(rowIndex).getProduct().getId();
        }else if (columnIndex == 1){
            return products.get(rowIndex).getProduct().getName();
        }else if (columnIndex == 2){
            return products.get(rowIndex).getProductAmount();
        }else if (columnIndex == 3){
            return products.get(rowIndex).getTotalCost();
        }
        return null;
    }
}
