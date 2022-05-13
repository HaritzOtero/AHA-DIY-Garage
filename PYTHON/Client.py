from BasicMethods import BasicMethods


class Client:

    def __init__(self):
        self.Id = 0
        self.name = ""
        self.surname = ""
        self.address = ""
        self.movile = 0

    def setId(self):
        self.Id = BasicMethods.askinteger("the ID: ")

    def setIdWP(self, id):
        self.Id = id

    def getID(self):
        return self.Id

    def setName(self):
        self.name = BasicMethods.askstring("the name: ")

    def getName(self):
        return self.name

    def setSurname(self):
        self.surname = BasicMethods.askstring("the surname: ")

    def getSurname(self):
        return self.surname

    def setAddress(self):
        self.address = BasicMethods.askstring("the address: ")

    def getAddress(self):
        return self.address

    def setMovile(self):
        self.movile = BasicMethods.askinteger("the movile: ")

    def getMovile(self):
        return self.movile

    def print(self):
        print("ID: " + str(self.Id) + ",Name: " + self.name + ",Surname: " + self.surname + ",Address: " + self.address + ",Movile: " + str(self.movile))

