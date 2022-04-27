/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

/**
 *
 * @author soto.aitzol
 */
public class Garage {
    private int garageCode;

    public Garage(int garageCode) {
        this.garageCode = garageCode;
    }

    public int getGarageCode() {
        return garageCode;
    }

    public void setGarageCode(int garageCode) {
        this.garageCode = garageCode;
    }

    @Override
    public String toString() {
        return "Garage{" + "garageCode=" + garageCode + '}';
    }
    
    
}
