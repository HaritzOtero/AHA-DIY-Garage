/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.time.LocalDate;

/**
 *
 * @author soto.aitzol
 */
public class Selling {
    private int id;
    private Client client;
    private Product product;
    private double totalCost;
    private int productAmount;
    private LocalDate date;
    
    public Selling(Product product,int productAmount, double totalCost){
        this.id = 0;
        this.client = null;
        this.product = product;
        this.totalCost = totalCost;
        this.productAmount = productAmount;
        this.date = null;
    }

    public Selling(int id, Client client, Product product, double totalCost, int productAmount, LocalDate date) {
        this.id = id;
        this.client = client;
        this.product = product;
        this.totalCost = totalCost;
        this.productAmount = productAmount;
        this.date = date;
    }

    public int getId() {
        return id;
    }

    public Client getClient() {
        return client;
    }

    public Product getProduct() {
        return product;
    }

    public double getTotalCost() {
        return totalCost;
    }

    public int getProductAmount() {
        return productAmount;
    }

    public LocalDate getDate() {
        return date;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setClient(Client client) {
        this.client = client;
    }

    public void setProduct(Product product) {
        this.product = product;
    }

    public void setTotalCost(int totalCost) {
        this.totalCost = totalCost;
    }

    public void setProductAmount(int productAmount) {
        this.productAmount = productAmount;
    }

    public void setDate(LocalDate date) {
        this.date = date;
    }
    
    
}
