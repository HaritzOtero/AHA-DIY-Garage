import pickle
import os

from Employee import  Employee


class Functions_Employee:


    def saveEmployee(self,obj, filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)


    def showEmployeeMenu(self):
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


    def addEmployee(self):
        e1 = Employee()
        e1.setId()
        e1.setName()
        e1.setSurname()
        e1.setAddress()
        e1.setMovile()
        e1.setPosition()
        e1.print()
        function_Employee = Functions_Employee()
        function_Employee.saveEmployee(e1, 'Employees.pkl')


    def deleteEmployee(self):
        if os.path.exists('Employees.pkl'):
            function_Employee = Functions_Employee()
            function_Employee.viewEmployees()
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
                    function_Employee.saveEmployee(cl, 'Employees.pkl')
        else:
            print("There aren't any employees")


    def viewEmployees(self):
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


    def modifyEmployee(self):
        print("Modifying employee")
        if os.path.exists('Employees.pkl'):
            function_Employee = Functions_Employee()
            function_Employee.viewEmployees()
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
                    function_Employee.saveEmployee(cl, 'Employees.pkl')
                elif int(cl.Id) == int(employeeId):
                    e1 = Employee()
                    e1.setIdWP(employeeId)
                    e1.setName()
                    e1.setSurname()
                    e1.setAddress()
                    e1.setMovile()
                    e1.setPosition()
                    function_Employee.saveEmployee(e1, 'Employees.pkl')
                else:
                    print("There isn't any employee with the same id")
        else:
            print("There aren't any employees")