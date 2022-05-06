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
            clientOption = Functions_Client.showClientMenu()
            if int(clientOption) == 1:
                ##Add client
                Functions_Client.addClient()
            elif int(clientOption) == 2:
                ##Delete client
                Functions_Client.deleteClient()
            elif int(clientOption) == 3:
                ##View clients
                Functions_Client.viewClients()
            elif int(clientOption) == 4:
               ##Modify client
               Functions_Client.modifyClient()
                
    elif int(optionSelected) == 2:
        employeeOption = 0
        while int(employeeOption) != 5:
            employeeOption = Functions_Employee.showEmployeeMenu()
            if int(employeeOption) == 1:
                ##Add employee
                Functions_Employee.addEmployee()
            elif int(employeeOption) == 2:
                ##Delete employee
                Functions_Employee.deleteEmployee()
            elif int(employeeOption) == 3:
                ##View employee
                Functions_Employee.viewEmployees()
            elif int(employeeOption) == 4:
               ##Modify employee
               Functions_Employee.modifyEmployee()

    elif int(optionSelected) == 3:
        productOption = 0
        while int(productOption) != 5:
            productOption = Functions_Product.showProductMenu()
            if int(productOption) == 1:
                ##Add product
                Functions_Product.addProduct()
            elif int(productOption) == 2:
                ##Delete product
                Functions_Product.deleteProduct()
            elif int(productOption) == 3:
                ##View products
                Functions_Product.viewProducts()
            elif int(productOption) == 4:
                ##Modify products
                Functions_Product.modifyProduct()

