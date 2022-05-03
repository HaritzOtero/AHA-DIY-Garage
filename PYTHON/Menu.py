from Functions_Client import Functions_Client

optionSelected = 0
def showMenu():
    print("MENU")
    print("============")
    print("1.Manage Clients")
    print("2.Manage Workers")
    print("3.Manage Products")
    print("4.Exit")

while int(optionSelected) != 4:
    showMenu()
    optionSelected = input("Select an option: ")

    if int(optionSelected) == 1:
        clientOption = 0
        while int(clientOption) != 6:
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
        print("Managing workers")
    elif int(optionSelected) == 3:
        print("Managing products")
