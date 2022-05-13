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
public class SoldProductsTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"ID", "NAME", "AMOUNT SOLD","TOTAL INCOME"};
    ArrayList<Selling> produktuak = new ArrayList();
    
    public SoldProductsTableModel(ArrayList<Selling> dProduktuak){
        this.produktuak = dProduktuak;
    }
    @Override
    public int getRowCount() {
        return produktuak.size();
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
            return produktuak.get(rowIndex).getProduct().getId();
        }else if (columnIndex == 1){
            return produktuak.get(rowIndex).getProduct().getName();
        }else if (columnIndex == 2){
            return produktuak.get(rowIndex).getProductAmount();
        }else if (columnIndex == 3){
            return produktuak.get(rowIndex).getTotalCost();
        }
        return null;
    }
}
