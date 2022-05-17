from BasicMethods import *
list_workers = []

class Worker:
    def __init__(self, id, nombre, apellido, email, password, phoneNumber, age, salary, position):
        self.id = id
        self.nombre = nombre
        self.apellido = apellido
        self.email = email
        self.password = password
        self.phoneNumber = phoneNumber
        self.age = age
        self.salary = salary
        self.position = position

    def setId(self):
        self.id = BasicMethods.askinteger("id of the worker: ")

    def setName(self):
        self.nombre = BasicMethods.askstring("name of the worker: ")

    def setSurname(self):
        self.apellido = BasicMethods.askstring("surname of the worker: ")

    def setSalary(self):
        self.salary = BasicMethods.askstring("Salary of the worker: ")

    def setEmail(self):
        self.email = BasicMethods.askstring("email of the worker: ")

    def setPhoneNumber(self):
        self.phoneNumber = BasicMethods.askstring("phone number of the worker: ")

    def setPassword(self):
        self.password = BasicMethods.askstring("password of the worker: ")
    def setAge(self):
        self.age = BasicMethods.askinteger("age of the worker: ")
    def setPosition(self):
        self.position = BasicMethods.askstring("enter the position of the worker: ")

    def print(self):
        print("Worker ID: " + str(self.id) + "  Name: " + self.nombre + " Surname: " + self.apellido + " Email: " + str(
            self.email) + "Phone number: " + str(self.phoneNumber) + "Password: " + str(self.password) + "Age" + str(self.age) + "Position"+ str(self.position) )

    def getId(self):
        return self.id

    def getName(self):
        return self.nombre

    def getSurname(self):
        return self.apellido

    def getEmail(self):
        return self.email

    def getPhonenumber(self):
        return self.phoneNumber

    def getPassword(self):
        return self.password

    def getAge(self):
        return self.age

    def getPosition(self):
        return self.position

    def getSalary(self):
        return self.salary