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

import javax.swing.JTable;

/**
 *
 * @author soto.aitzol
 */
public class Model {

    private static Connection connect() {
        // SQLite connection string
        String url = "jdbc:mysql://192.168.72.222:3306/aha_diy_garage";
        String username = "uni";
        String password = "uni";
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(url, username, password);
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;
    }

    public static ArrayList<Selling> mostSoldProductsArray() {
        String sql = "select p.product_id, name, sum(amount),sum(total_cost) from products p left join selling s on s.product_id  = p.product_id group by product_id order by amount desc";
        ArrayList<Selling> products = new ArrayList();
        try ( Connection conn = Model.connect();  Statement stmt = conn.createStatement();  ResultSet rs = stmt.executeQuery(sql)) {
            // loop through the result set
            while (rs.next()) {
                Product p1 = new Product(rs.getInt("p.product_id"), rs.getString("name"));
                Selling s1 = new Selling(p1, rs.getInt("sum(amount)"), rs.getInt("sum(total_cost)"));
                products.add(s1);
            }

            return products;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Renting> garageOccupationArray(String month, int year) {
        String sql = "select date,r.client_id,c.name,garage_id, count(renting_id) from renting r,client c where c.client_id = r.client_id and monthname(`date`) = ? and year(`date`) = ? group by renting_id order by date asc";
        ArrayList<Renting> occupation = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, month);
            pstmt.setInt(2, year);
            ResultSet rs = pstmt.executeQuery();

            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(rs.getInt("r.client_id"), rs.getString("name"), "");
                Garage g1 = new Garage(rs.getInt("garage_id"));
                Renting r1 = new Renting(c1, rs.getInt("count(renting_id)") * 20, rs.getInt("count(renting_id)"), g1, rs.getDate("date").toLocalDate());
                occupation.add(r1);
            }
            return occupation;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Selling> mostSoldProductsByMonth(String month) {
        String sql = "select p.product_id ,name, sum(amount),sum(total_cost)  from selling s, products p where s.product_id = p.product_id and monthname(date) = ? group by s.product_id order by amount desc";
        ArrayList<Selling> products = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, month);
            ResultSet rs = pstmt.executeQuery();

            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(0, "", "");
                Product p1 = new Product(rs.getInt("p.product_id"), rs.getString("name"));
                Selling s1 = new Selling(p1, rs.getInt("sum(amount)"), rs.getDouble("sum(total_cost)"));
                products.add(s1);
            }
            return products;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Renting> totalRentedHoursByClient() {
        String sql = "SELECT r.client_id , name, count(renting_id) from client c ,renting r where r.client_id = c.client_id group by r.client_id order by count(renting_id) desc";
        ArrayList<Renting> occupation = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            ResultSet rs = pstmt.executeQuery();

            // loop through the result set
            while (rs.next()) {
                Client c1 = new Client(rs.getInt("r.client_id"), rs.getString("name"), "");
                Garage g1 = new Garage(0);
                Renting r1 = new Renting(c1, rs.getInt("count(renting_id)") * 20, rs.getInt("count(renting_id)"), g1, null);
                occupation.add(r1);
            }
            return occupation;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Employee> employeesByPosition(String position) {
        String sql = "select employee_id,name,surname,age,salary  from employee e where position = ?";
        ArrayList<Employee> employees = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, position);
            ResultSet rs = pstmt.executeQuery();

            // loop through the result set
            while (rs.next()) {
                Employee e1 = new Employee(rs.getInt("employee_id"), rs.getString("name"), rs.getString("surname"), null, rs.getInt("age"), rs.getInt("salary"));
                employees.add(e1);
            }
            return employees;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Selling> incomeFromSelling(int year) {
        String sql = "select date,sum(total_cost) from selling s where year(date) = ? group by month(date)";
        ArrayList<Selling> incomeSelling = new ArrayList<>();

        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, year);
            ResultSet rs = pstmt.executeQuery();
            for (int i = 1; i <= 12; i++) {
                Selling s1 = new Selling(LocalDate.of(year, i, 01), 0);
                incomeSelling.add(s1);
            }
            // loop through the result set
            while (rs.next()) {
                LocalDate date = rs.getDate("date").toLocalDate();
                Double total = rs.getDouble("sum(total_cost)");
                total = Math.round(total * 100.0) / 100.0;
                Selling s1 = new Selling(LocalDate.of(year, date.getMonth(), 01), total);
                for (int i = 0; i < 12; i++) {
                    if (s1.getDate().getYear() == year && s1.getDate().getMonth() == incomeSelling.get(i).getDate().getMonth()) {
                        incomeSelling.set(i, s1);
                    }
                }
            }
            Selling total = new Selling(LocalDate.now(), 0);
            incomeSelling.add(total);
            return incomeSelling;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static ArrayList<Renting> incomeFromRenting(int year) {
        String sql = "select date,count(renting_id) from renting r where year(date) = ? group by month(date)";
        ArrayList<Renting> incomeRenting = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, year);
            ResultSet rs = pstmt.executeQuery();

            for (int i = 1; i <= 12; i++) {
                Renting r1 = new Renting(LocalDate.of(year, i, 01), 0);
                incomeRenting.add(r1);
            }
            // loop through the result set
            while (rs.next()) {
                LocalDate date = rs.getDate("date").toLocalDate();
                Renting r1 = new Renting(LocalDate.of(year, date.getMonth(), 01), rs.getInt("count(renting_id)") * 20);

                for (int i = 0; i < 12; i++) {
                    if (r1.getDate().getYear() == year && r1.getDate().getMonth() == incomeRenting.get(i).getDate().getMonth()) {
                        incomeRenting.set(i, r1);
                    }
                }
            }
            Renting total = new Renting(LocalDate.now(), 0);
            incomeRenting.add(total);
            return incomeRenting;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static double calculateTotalSelling(ArrayList<Selling> incomeFromSelling) {
        double totalIncomeSelling = 0;
        for (int i = 0; i < incomeFromSelling.size(); i++) {
            totalIncomeSelling += incomeFromSelling.get(i).getTotalCost();
        }
        totalIncomeSelling = Math.round(totalIncomeSelling * 100) / 100;
        return totalIncomeSelling;
    }

    public static double calculateTotalRenting(ArrayList<Renting> incomeFromRenting) {
        double totalIncomeRenting = 0;
        for (int i = 0; i < incomeFromRenting.size(); i++) {
            totalIncomeRenting += incomeFromRenting.get(i).getPrice();
        }
        totalIncomeRenting = Math.round(totalIncomeRenting * 100) / 100;
        return totalIncomeRenting;
    }

    public static ArrayList<Renting> garageOccupationByMonth(int year) {
        String sql = "select date,count(renting_id),garage_id from renting r where year(date) = ? group by month(`date`)";
        ArrayList<Renting> garageOccupation = new ArrayList<>();
        try ( Connection conn = Model.connect();  PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, year);
            ResultSet rs = pstmt.executeQuery();

            for (int i = 1; i <= 12; i++) {
                Renting r1 = new Renting(LocalDate.of(year, i, 01), 0);
                garageOccupation.add(r1);
            }
            // loop through the result set
            while (rs.next()) {
                LocalDate date = rs.getDate("date").toLocalDate();
                Garage g1 = new Garage(rs.getInt("garage_id"));
                Renting r1 = new Renting(LocalDate.of(year, date.getMonth(), 01), rs.getInt("count(renting_id)"), g1);
                for (int i = 0; i < 12; i++) {
                    if (r1.getDate().getYear() == year && r1.getDate().getMonth() == garageOccupation.get(i).getDate().getMonth()) {
                        garageOccupation.set(i, r1);
                    }
                }
            }
            return garageOccupation;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }

    public static void saveReportTxt(JTable taula, String fileName) {
        BufferedReader inputStream = null;
        PrintWriter outputStream = null;
        String lerroa = "";
        try {
            outputStream = new PrintWriter(new FileWriter(fileName + ".txt"));
            for (int i = 0; i < taula.getColumnCount(); i++) {
                lerroa = lerroa + taula.getColumnName(i) + "\t";
            }
            outputStream.print(lerroa);
            outputStream.println("");
            outputStream.println("======================================================");
            for (int i = 0; i < taula.getRowCount(); i++) {
                lerroa = "";
                for (int j = 0; j < taula.getColumnCount(); j++) {
                    //lerroa = lerroa + " " + taula.getValueAt(i, j).toString();
                    outputStream.print(taula.getValueAt(i, j).toString() + " ");
                }
                outputStream.println(lerroa);

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

    public void drawGraphicBase(Graphics g, int y2) {
        g.clearRect(40, 100, 900, 900);
        //g.drawRect(40, 100, 300, 300);
        g.setColor(Color.BLACK);
        g.drawLine(100, 200, 100, 400);
        g.drawLine(100, 400, y2, 400);
    }

    public void drawReport1(Graphics g, ArrayList<Selling> incomeFromSelling, ArrayList<Renting> incomeFromRenting) {
        g.setColor(Color.BLACK);
        drawGraphicBase(g, 850);
        //Months
        String[] months = {"JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"};

        int maxRenting = 0;
        int maxSelling = 0;
        int x = 100;
        if (incomeFromRenting != null && incomeFromSelling != null) {
            //Draw months
            for (int i = 0; i < months.length; i++) {
                if (i == 0) {
                    x += 10;
                } else {
                    x += 65;
                }
                g.drawString(months[i], x, 420);

                //Max income
                if (incomeFromSelling.get(i).getTotalCost() > maxSelling) {
                    maxSelling = (int) incomeFromSelling.get(i).getTotalCost();
                }

                if (incomeFromRenting.get(i).getPrice() > maxRenting) {
                    maxRenting = (int) incomeFromRenting.get(i).getPrice();
                }

            }

            //Selling income
            g.setColor(Color.BLUE);
            x = 100;
            int widthOval = 8;
            int heightOval = 8;
            int yBerria = 0;
            int yZaharra = 0;
            try {
                for (int i = 0; i < months.length; i++) {
                    yZaharra = yBerria;
                    if (maxRenting > maxSelling) {
                        yBerria = ((int) incomeFromSelling.get(i).getTotalCost() * 200) / maxRenting;//Max -200 pixel
                    } else {
                        yBerria = ((int) incomeFromSelling.get(i).getTotalCost() * 200) / maxSelling;//Max -200 pixel
                    }

                    if (i == 0) {
                        x += 20;
                        g.drawLine(x - 20, 400, x, 400 - yBerria);
                        g.fillOval(x - 2, 400 - yBerria - 2, widthOval, heightOval);
                    } else {
                        x += 65;
                        g.drawLine(x - 65, 400 - yZaharra, x, 400 - yBerria);
                        g.fillOval(x - 2, 400 - yBerria - 2, widthOval, heightOval);
                    }
                }
            } catch (ArithmeticException e) {
                System.out.println(e);
            }
            //Renting income
            g.setColor(Color.MAGENTA);
            x = 100;
            yBerria = 0;
            yZaharra = 0;
            try {
                for (int i = 0; i < months.length; i++) {
                    yZaharra = yBerria;
                    if (maxRenting > maxSelling) {
                        yBerria = ((int) incomeFromRenting.get(i).getPrice() * 200) / maxRenting;//Max -200 pixel
                    } else {
                        yBerria = ((int) incomeFromRenting.get(i).getPrice() * 200) / maxSelling;//Max -200 pixel
                    }
                    if (i == 0) {
                        x += 20;
                        g.drawLine(x - 20, 400, x, 400 - yBerria);
                        g.fillOval(x - 2, 400 - yBerria - 2, widthOval, heightOval);
                    } else {
                        x += 65;
                        g.drawLine(x - 65, 400 - yZaharra, x, 400 - yBerria);
                        g.fillOval(x - 2, 400 - yBerria - 2, widthOval, heightOval);
                    }
                }
            } catch (ArithmeticException e) {
                System.out.println(e);
            }
            //Rect
            g.setColor(Color.BLUE);
            g.fillRect(100, 450, 20, 20);
            g.drawString("TOTAL INCOME FROM SELLING", 125, 465);
            g.setColor(Color.MAGENTA);
            g.fillRect(100, 500, 20, 20);
            g.drawString("TOTAL INCOME FROM RENTING", 125, 515);
            //Info
            g.setColor(Color.BLACK);
            g.drawString("MONTHS", 860, 405);
            g.drawString("INCOME", 50, 185);
            //Dinero
            g.drawString("0", 85, 400);
            if (maxRenting > maxSelling) {
                g.drawString(String.valueOf(maxRenting), 75, 200);
                g.drawString(String.valueOf(maxRenting / 2), 75, 300);
                g.drawString(String.valueOf(maxRenting / 4), 75, 350);
                g.drawString(String.valueOf((int) (maxRenting / 1.33)), 75, 250);
            } else {
                g.drawString(String.valueOf(maxSelling / 2), 75, 300);
                g.drawString(String.valueOf(maxSelling / 2), 75, 300);
                g.drawString(String.valueOf(maxSelling / 4), 75, 350);
                g.drawString(String.valueOf((int) (maxSelling / 1.33)), 75, 250);
            }

        }
    }

    public void drawReport2(Graphics g, ArrayList<Renting> garageOccupation) {
        g.setColor(Color.BLACK);
        drawGraphicBase(g, 875);

        //Months
        String[] months = {"JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"};
        int x = 50;
        int maxHours = 0;
        for (int i = 0; i < months.length; i++) {
            x += 65;
            g.drawString(months[i], x, 425);

            if (garageOccupation.get(i).getHours() > maxHours) {
                maxHours = garageOccupation.get(i).getHours();
            }
        }

        g.setColor(Color.MAGENTA);
        x = 120;
        try {
            for (int i = 0; i < garageOccupation.size(); i++) {

                int y = (garageOccupation.get(i).getHours() * 200) / maxHours;

                x += 65;
                g.fillRect(x - 65, 400 - y, 20, y);
                g.drawString(String.valueOf(garageOccupation.get(i).getHours()), x - 60, 400 - y - 10);
            }
        } catch (Exception e) {
            System.out.println(e);
        }

        //Info
        g.setColor(Color.BLACK);
        g.drawString("MONTHS", 885, 405);
        g.drawString("RENTED HOURS", 50, 190);
    }

    public void drawReport3(Graphics g, ArrayList<Selling> products) {
        Color[] colors = {Color.RED, Color.BLUE, Color.GREEN, Color.PINK, Color.ORANGE, Color.YELLOW, Color.GRAY, Color.MAGENTA, Color.CYAN};
        g.clearRect(40, 100, 900, 900);
        //Total sold
        int total = 0;
        for (int i = 0; i < products.size(); i++) {
            total += products.get(i).getProductAmount();
        }
        //Product names
        int yPos = 150;
        for (int i = 0; i < products.size(); i++) {
            g.setColor(colors[i]);
            g.drawString(String.valueOf(products.get(i).getProductAmount()), 435, yPos + 15);
            g.fillRect(450, yPos, 20, 20);
            g.drawString(products.get(i).getProduct().getName(), 475, yPos + 15);
            yPos += 50;
        }

        int angleBerria = 0;
        int angleZaharra = 0;
        try {
            //Circle
            for (int i = 0; i < products.size(); i++) {
                if (i == products.size() - 1) {
                    angleZaharra += angleBerria;
                    angleBerria = 360 - angleZaharra;
                    g.setColor(colors[i]);
                    g.fillArc(200, 175, 200, 200, angleZaharra, angleBerria);
                } else {
                    angleZaharra += angleBerria;
                    angleBerria = ((products.get(i).getProductAmount() * 360) / total);
                    g.setColor(colors[i]);
                    g.fillArc(200, 175, 200, 200, angleZaharra, angleBerria);
                }

            }
        } catch (ArithmeticException e) {
            System.out.println(e);
        }
        g.setColor(Color.BLACK);
        g.drawArc(200, 175, 199, 199, 0, 360);

    }

    public static void main(String[] args) {
        System.out.println(garageOccupationArray("May", 2022));
    }
}
