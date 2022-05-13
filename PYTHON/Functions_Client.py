import pickle
import os

from Client import Client


class Functions_Client:


    def saveClient(self,obj,filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)


    def showClientMenu(self):
        clientsOption = 0
        ##while int(clientsOption) != 5:
        print("")
        print("Clients Menu")
        print("================")
        print("1.Add client")
        print("2.Delete client")
        print("3.View Clients")
        print("4.Modify client")
        print("5.Exit menu")

        clientsOption = input("Select an option: ")
        return clientsOption



    def addClient(self):
        c1 = Client()
        c1.setId()
        c1.setName()
        c1.setSurname()
        c1.setAddress()
        c1.setMovile()
        c1.print()
        function_Client = Functions_Client()
        function_Client.saveClient(c1, 'Clients.pkl')


    def deleteClient(self):
        if os.path.exists('Clients.pkl'):
            function_Client = Functions_Client()
            function_Client.viewClients()
            clientID = input("Enter the id of the client: ")
            inp = open('Clients.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of clients\n")
                    cont = 0
            inp.close()
            if os.path.exists('Clients.pkl'):
                os.remove('Clients.pkl')
            for cl in objects:
                if int(cl.Id) != int(clientID):
                    function_Client.saveClient(cl, 'Clients.pkl')
        else:
            print("There aren't any clients")


    def viewClients(self):
        if os.path.exists('Clients.pkl'):

            inp = open('Clients.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of clients\n")
                    cont = 0
            for cl in objects:
                #print("ID: " + cl.Id + ",Name: " + cl.name + ",Surname: " + cl.surname + ",Address: " + cl.address + ",Movile: " + cl.movile)
                cl.print()
        else:
            print("There aren't any clients")


    def modifyClient(self):
        print("Modifying client")
        if os.path.exists('Clients.pkl'):
            function_Client = Functions_Client()
            function_Client.viewClients()
            clientID = input("Enter the id of the client: ")
            inp = open('Clients.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    ##print("end of clients\n")
                    cont = 0
            inp.close()
            if os.path.exists('Clients.pkl'):
                os.remove('Clients.pkl')
            for cl in objects:
                if int(cl.Id) != int(clientID):
                    function_Client.saveClient(cl, 'Clients.pkl')
                elif int(cl.Id) == int(clientID):
                    c1 = Client()
                    c1.setIdWP(clientID)
                    c1.setName()
                    c1.setSurname()
                    c1.setAddress()
                    c1.setMovile()
                    function_Client.saveClient(c1, 'Clients.pkl')
                else:
                    print("There isn't any client with the same id ")
        else:
            print("There aren't any clients")





