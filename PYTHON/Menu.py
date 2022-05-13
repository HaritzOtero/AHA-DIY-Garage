from Functions_Client import Functions_Client
from Functions_Employee import Functions_Employee
from Functions_Product import  Functions_Product

optionSelected = 0
def showMenu():
    print("MENU")
    print("============")
    print("1.Manage Clients")
    print("2.Manage Employees")
    print("3.Manage Products")
    print("4.Exit")

while int(optionSelected) != 4:
    showMenu()
    optionSelected = input("Select an option: ")

    if int(optionSelected) == 1:
        clientOption = 0
        while int(clientOption) != 5:
            function_Client = Functions_Client()
            clientOption = function_Client.showClientMenu()
            if int(clientOption) == 1:
                ##Add client
                function_Client.addClient()
            elif int(clientOption) == 2:
                ##Delete client
                function_Client.deleteClient()
            elif int(clientOption) == 3:
                ##View clients
                function_Client.viewClients()
            elif int(clientOption) == 4:
               ##Modify client
               function_Client.modifyClient()

    elif int(optionSelected) == 2:
        employeeOption = 0
        while int(employeeOption) != 5:
            function_Employee = Functions_Employee()
            employeeOption = function_Employee.showEmployeeMenu()
            if int(employeeOption) == 1:
                ##Add employee
                function_Employee.addEmployee()
            elif int(employeeOption) == 2:
                ##Delete employee
                function_Employee.deleteEmployee()
            elif int(employeeOption) == 3:
                ##View employee
                function_Employee.viewEmployees()
            elif int(employeeOption) == 4:
               ##Modify employee
               function_Employee.modifyEmployee()

    elif int(optionSelected) == 3:
        productOption = 0
        while int(productOption) != 5:
            function_Product = Functions_Product()
            productOption = function_Product.showProductMenu()
            if int(productOption) == 1:
                ##Add product
                function_Product.addProduct()
            elif int(productOption) == 2:
                ##Delete product
                function_Product.deleteProduct()
            elif int(productOption) == 3:
                ##View products
                function_Product.viewProducts()
            elif int(productOption) == 4:
                ##Modify products
                function_Product.modifyProduct()

