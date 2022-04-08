/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.awt.Color;
import java.awt.Graphics;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.util.ArrayList;
import javax.swing.JDialog;

/**
 *
 * @author soto.aitzol
 */
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
    
    public static void selectEmployees() {
        String sql = "SELECT employee_id, name, surname,position,salary FROM employee";
        int guztira = 0;

        
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            System.out.printf("%10s %10s %10s %10s %10s\n","ID","NAME","SURNAME","POSITION","SALARY");
            System.out.printf("===========================================================");
            // loop through the result set
            while (rs.next()) {
                Employee e1 = new Employee(rs.getInt("employee_id"),rs.getString("name"),rs.getString("surname"),rs.getString("position"),rs.getInt("salary"));
                System.out.printf("\n%10d %10s %10s %10s %10d",e1.getId(),e1.getName(),e1.getSurname(),e1.getPosition(),e1.getSalary());
            }
            System.out.println("");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    
    /*public static void garageOccupation(){
        String sql = "SELECT date, rented_hours, garage_id,r.client_id,name,surname FROM renting r, client c where r.client_id = c.client_id && date >= '2022-02-01' && date <= '2022-02-28' order by `date` ";
                
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            System.out.printf("%15s %15s %15s %15s %15s %15s %15s\n","DATE","RENTED HOURS","GARAGE_ID","CLIENT_ID","NAME","SURNAME","PRICE");
            System.out.printf("====================================================================================================================");
            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(rs.getInt("client_id"),rs.getString("name"),rs.getString("surname"));
                Garage g1 = new Garage(rs.getInt("garage_id"));
                Renting r1 = new Renting(c1, 50, rs.getInt("rented_hours"), g1, rs.getDate("date").toLocalDate());
                System.out.printf("\n%15s %15d %15d %15d %15s %15s %15d",r1.getDate().toString(),r1.getHours(),r1.getGarage().getGarageCode(),r1.getClient().getId(),r1.getClient().getName(),r1.getClient().getSurname(),50);
            }
            System.out.println("");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    
    public static void mostSoldProducts(){
        String sql = "select name,s.product_id,count(s.selling_id)   from selling s,products p where p.product_id = s.product_id  group by product_id order by count(s.selling_id) desc";
                
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {
            
            System.out.printf("%15s %15s %15s \n","ID","NAME","AMOUNT");
            System.out.printf("=========================================================================");
            // loop through the result set
            while (rs.next()) {
                Product p1 = new Product(rs.getInt("s.product_id"), rs.getString("name"));
                Selling s1 = new Selling(p1,rs.getInt("count(s.selling_id)"));
                System.out.printf("\n%15d %15s %15d ",s1.getProduct().getId(),s1.getProduct().getName(),s1.getProductAmount());
            }
            System.out.println("");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }*/
    
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
    
    public static ArrayList<Renting> garageOccupationArray(){
        String sql = "SELECT date, rented_hours, garage_id,r.client_id,name,surname FROM renting r, client c where r.client_id = c.client_id order by date asc";
        ArrayList<Renting> occupation= new ArrayList<>();
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(rs.getInt("client_id"),rs.getString("name"),rs.getString("surname"));
                Garage g1 = new Garage(rs.getInt("garage_id"));
                Renting r1 = new Renting(c1, rs.getInt("rented_hours")*20, rs.getInt("rented_hours"), g1, rs.getDate("date").toLocalDate());
                occupation.add(r1);
            }  
            return occupation;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }
    
    public static ArrayList<Renting> rentedHoursByClientArray(){
        String sql = "select c.client_id, c.name, c.surname,sum(r.rented_hours)  from client c,renting r where r.client_id = c.client_id group by client_id order by sum(r.rented_hours) desc";
        ArrayList<Renting> rentedHours = new ArrayList<>();
        try (Connection conn = Model.connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(rs.getInt("c.client_id"),rs.getString("c.name"),rs.getString("c.surname"));
                Renting r1 = new Renting(c1, rs.getInt("sum(r.rented_hours)"));
                rentedHours.add(r1);
            }  
            return rentedHours;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
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
    
    public static void main(String[] args) {
        //selectEmployees();
        //mostSoldProducts();
    }
}
