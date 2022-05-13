from BasicMethods import BasicMethods

class Product:
    def __init__(self):
        self.id = 0
        self.name = ""
        self.description = ""
        self.price = 0

    def setIdWP(self,id):
        self.id
    def setId(self):
        self.id = BasicMethods.askinteger("the id: ")

    def getId(self):
        return self.id

    def setName(self):
        self.name = BasicMethods.askstring("the name: ")

    def getName(self):
        return self.name

    def setDescription(self):
        self.description = BasicMethods.askstring("the description:")

    def getDescription(self):
        return self.description

    def setPrice(self):
        self.price = BasicMethods.askinteger("the price: ")

    def getPrice(self):
        return self.price

    def print(self):
        print("ID: " + str(self.id) + ",Name: " + self.name + ",Description: " + self.description + ",Price: " + str(self.price))