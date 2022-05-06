import pickle
import os

from Employee import  Employee


class Functions_Employee:

    @staticmethod
    def saveEmployee(obj, filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)

    @staticmethod
    def showEmployeeMenu():
        employeeOption = 0

        print("")
        print("Employees Menu")
        print("================")
        print("1.Add employee")
        print("2.Delete employee")
        print("3.View employees")
        print("4.Modify employee")
        print("5.Exit menu")

        employeeOption = input("Select an option: ")
        return employeeOption

    @staticmethod
    def addEmployee():
        e1 = Employee()
        e1.setId()
        e1.setName()
        e1.setSurname()
        e1.setAddress()
        e1.setMovile()
        e1.setPosition()
        e1.print()
        Functions_Employee.saveEmployee(e1, 'Employees.pkl')

    @staticmethod
    def deleteEmployee():
        if os.path.exists('Employees.pkl'):
            Functions_Employee.viewEmployees()
            employeeId = input("Enter the id of the employee: ")
            inp = open('Employees.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of employees\n")
                    cont = 0
            inp.close()
            if os.path.exists('Employees.pkl'):
                os.remove('Employees.pkl')
            for cl in objects:
                if int(cl.Id) != int(employeeId):
                    Functions_Employee.saveEmployee(cl, 'Employees.pkl')
        else:
            print("There aren't any employees")

    @staticmethod
    def viewEmployees():
        if os.path.exists('Employees.pkl'):

            inp = open('Employees.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of employees\n")
                    cont = 0
            for cl in objects:
                #print("ID: " + cl.Id + ",Name: " + cl.name + ",Surname: " + cl.surname + ",Address: " + cl.address + ",Movile: " + cl.movile + ",Position: " + cl.position)
                cl.print()
        else:
            print("There aren't any employees")

    @staticmethod
    def modifyEmployee():
        print("Modifying employee")
        if os.path.exists('Employees.pkl'):
            Functions_Employee.viewEmployees()
            employeeId = input("Enter the id of the employee: ")
            inp = open('Employees.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    ##print("end of employees\n")
                    cont = 0
            inp.close()
            if os.path.exists('Employees.pkl'):
                os.remove('Employees.pkl')
            for cl in objects:
                if int(cl.Id) != int(employeeId):
                    Functions_Employee.saveEmployee(cl, 'Employees.pkl')
                elif int(cl.Id) == int(employeeId):
                    e1 = Employee()
                    e1.setIdWP(employeeId)
                    e1.setName()
                    e1.setSurname()
                    e1.setAddress()
                    e1.setMovile()
                    e1.setPosition()
                    Functions_Employee.saveEmployee(e1, 'Employees.pkl')
                else:
                    print("There isn't any employee with the same id")
        else:
            print("There aren't any employees")