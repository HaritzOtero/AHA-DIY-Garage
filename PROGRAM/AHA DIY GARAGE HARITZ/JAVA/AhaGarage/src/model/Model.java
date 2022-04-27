/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.awt.Color;
import java.awt.Graphics;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.util.ArrayList;
import javax.swing.JDialog;
import javax.swing.JTable;


public class Model {
    /*public static void connect() {
        Connection conn = null;
        try {
            // db parameters
            String url = "jdbc:mysql://localhost:3306/aha_diy_garage";
            String username = "root";
            String password = "";
            // create a connection to the database
            conn = DriverManager.getConnection(url,username,password);
            
            System.out.println("Connection to SQLite has been established.");
            
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        } finally {
            try {
                if (conn != null) {
                    conn.close();
                }
            } catch (SQLException ex) {
                System.out.println(ex.getMessage());
            }
        }
    }*/
    
    private static Connection connect() {
        // SQLite connection string
        String url = "jdbc:mysql://localhost:3306/aha_diy_garage";
        String username = "root";
        String password = "";
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(url,username,password);
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;
    }
    
   
    
    public static ArrayList<Selling> mostSoldProductsArray(){
        String sql = "select p.product_id, name, count(s.selling_id),(count(s.selling_id) * price) from products p left join selling s on s.product_id  = p.product_id group by product_id order by count(s.selling_id) desc";
        ArrayList<Selling> products = new ArrayList();
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            // loop through the result set
            while (rs.next()) {
                Product p1 = new Product(rs.getInt("p.product_id"), rs.getString("name"));
                Selling s1 = new Selling(p1,rs.getInt("count(s.selling_id)"),rs.getInt("(count(s.selling_id) * price)"));
                products.add(s1);
            }
            
            return products;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }
    
   public static void saveReportTxt(JTable taula,String fileName) {
        BufferedReader inputStream = null;
        PrintWriter outputStream = null;
        String lerroa = "";
        try {
            outputStream = new PrintWriter(new FileWriter(fileName + ".txt"));
            for (int i = 0; i < taula.getColumnCount(); i++) {
                lerroa = lerroa + taula.getColumnName(i) + "\t";
            }
            outputStream.print(lerroa);
            lerroa = "";
            outputStream.println("");
            outputStream.println("======================================================");
            for (int i = 0; i < taula.getRowCount(); i++) {
                for (int j = 0; j < taula.getColumnCount(); j++) {
                    lerroa = lerroa + " " + taula.getValueAt(i, j).toString();
                }
                outputStream.println(lerroa);
                lerroa = "";
            }
        } catch (FileNotFoundException e) {
            System.out.println(e);
        } catch (IOException e) {
            System.out.println(e);
        } finally {
            if (outputStream != null) {
                outputStream.close();
            }
        }
    }
    
    
    public void drawGraphicBase(Graphics g){
        g.clearRect(40, 100, 300, 300);
        //g.drawRect(40, 100, 300, 300);
        g.setColor(Color.BLACK);
        g.drawLine(50, 150, 50, 350);
        g.drawLine(50, 350, 300, 350);
    }
    
    public void drawReport1(Graphics g){
        g.setColor(Color.MAGENTA);
        //g.drawLine(70, 350, 70, 200);
        //g.drawLine(90, 350,90, 250);
        //g.drawLine(110, 350,110, 320);
        //g.drawLine(130, 350,130, 225);
        //g.drawLine(150, 350,150, 235);
        g.fillRect(70, 350-25, 10, 25);
        g.fillRect(100, 350-45, 10, 45);
        g.fillRect(130, 350-100, 10, 100);
        g.fillRect(160, 350-60, 10, 60);
        g.fillRect(190, 350-40, 10, 40);
    }
    
    public void drawReport2(Graphics g){
        g.setColor(Color.GREEN);
        g.fillRect(70, 350-25, 10, 25);
        g.fillRect(100, 350-45, 10, 45);
        g.fillRect(130, 350-100, 10, 100);
        g.fillRect(160, 350-60, 10, 60);
        g.fillRect(190, 350-40, 10, 40);
    }
    
    public void drawReport3(Graphics g){
        g.setColor(Color.ORANGE);
        g.fillRect(70, 350-25, 10, 25);
        g.fillRect(100, 350-45, 10, 45);
        g.fillRect(130, 350-100, 10, 100);
        g.fillRect(160, 350-60, 10, 60);
        g.fillRect(190, 350-40, 10, 40);
    }
    
    public void drawReport4(Graphics g){
        g.setColor(Color.RED);
        g.fillRect(70, 350-25, 10, 25);
        g.fillRect(100, 350-45, 10, 45);
        g.fillRect(130, 350-100, 10, 100);
        g.fillRect(160, 350-60, 10, 60);
        g.fillRect(190, 350-40, 10, 40);
    }
    
   
}
