package model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


public class Employee {
    private int id;
    private String name;
    private String surname;
    private String position;
    private int age;
    private int salary;

    public Employee(int id, String name, String surname, String position,int age,int salary){
        this.id = id;
        this.name = name;
        this.surname = surname;
        this.position = position;
        this.age = age;
        this.salary = salary;
    }

    public void setId(int id){
        this.id = id;
    }

    public void setName(String name){
        this.name = name;
    }

    public void setSurname(String surname){
        this.surname = surname;
    }

    public void setPosition(String position){
        this.position = position;
    }


    public void setSalary(int salary){
        this.salary = salary;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getSurname() {
        return surname;
    }

    public String getPosition() {
        return position;
    }


    public int getSalary() {
        return salary;
    }

    public int getAge() {
        return age;
    }
    
    

    @Override
    public String toString() {
        return "Employee{" + "id=" + id + ", name=" + name + ", surname=" + surname + ", position=" + position + ", salary=" + salary + '}';
    }
    
    
}
