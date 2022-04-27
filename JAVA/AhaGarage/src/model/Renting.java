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
public class Renting {
    private Client client;
    private int price;
    private int hours;
    private Garage garage;
    private LocalDate date;
    
    public Renting(LocalDate date,int price){
        this.date = date;
        this.price = price;
        this.client = null;
        this.garage = null;
        this.hours = 0;
    }

    public Renting(Client client,int hours){
        this.client = client;
        this.hours = hours;
        this.price = 0;
        this.garage = null;
        this.date = null;
    }
    public Renting(Client client, int price, int hours, Garage garage, LocalDate date) {
        this.client = client;
        this.price = price;
        this.hours = hours;
        this.garage = garage;
        this.date = date;
    }

  

    public Client getClient() {
        return client;
    }

    public int getPrice() {
        return price;
    }

    public int getHours() {
        return hours;
    }

    public Garage getGarage() {
        return garage;
    }

    public LocalDate getDate() {
        return date;
    }

    public void setClient(Client client) {
        this.client = client;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public void setHours(int hours) {
        this.hours = hours;
    }

    public void setGarage(Garage garage) {
        this.garage = garage;
    }

    public void setDate(LocalDate date) {
        this.date = date;
    }

    @Override
    public String toString() {
        return "Renting{" + "client=" + client + ", price=" + price + ", hours=" + hours + ", garage=" + garage + ", date=" + date + '}';
    }
    
    
}
