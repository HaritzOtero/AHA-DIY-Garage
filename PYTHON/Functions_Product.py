import pickle
import os

from Product import Product

class Functions_Product:

    @staticmethod
    def saveProduct(obj, filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)

    @staticmethod
    def showProductMenu():
        productOption = 0

        print("")
        print("Products Menu")
        print("================")
        print("1.Add product")
        print("2.Delete product")
        print("3.View products")
        print("4.Modify product")
        print("5.Exit menu")

        productOption = input("Select an option: ")
        return productOption

    @staticmethod
    def addProduct():
        p1 = Product()
        p1.setId()
        p1.setName()
        p1.setDescription()
        p1.setPrice()
        p1.print()
        Functions_Product.saveProduct(p1, 'Products.pkl')

    @staticmethod
    def deleteProduct():
        if os.path.exists('Products.pkl'):
            Functions_Product.viewProducts()
            productId = input("Enter the id of the product: ")
            inp = open('Products.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of products\n")
                    cont = 0
            inp.close()
            if os.path.exists('Products.pkl'):
                os.remove('Products.pkl')
            for cl in objects:
                if int(cl.id) != int(productId):
                    Functions_Product.saveProduct(cl, 'Products.pkl')
        else:
            print("There aren't any products")

    @staticmethod
    def viewProducts():
        if os.path.exists('Products.pkl'):

            inp = open('Products.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    print("end of products\n")
                    cont = 0
            for cl in objects:
                ##print("ID: " + cl.id + ",Name: " + cl.name + ",Description: " + cl.description + ",Price: " + cl.price)
                cl.print()
        else:
            print("There aren't any products")

    @staticmethod
    def modifyProduct():
        print("Modifying products")
        if os.path.exists('Products.pkl'):
            Functions_Product.viewProducts()
            productId = input("Enter the id of the product: ")
            inp = open('Products.pkl', 'rb')
            objects = []
            cont = 1
            while cont == 1:
                try:
                    objects.append(pickle.load(inp))
                except EOFError:
                    ##print("end of products\n")
                    cont = 0
            inp.close()
            if os.path.exists('Products.pkl'):
                os.remove('Products.pkl')
            for cl in objects:
                if int(cl.id) != int(productId):
                    Functions_Product.saveProduct(cl, 'Products.pkl')
                elif int(cl.id) == int(productId):
                    p1 = Product()
                    p1.setIdWP(productId)
                    p1.setName()
                    p1.setDescription()
                    p1.setPrice()
                    Functions_Product.saveProduct(p1, 'Products.pkl')
                else:
                    print("There isn't any product with the same id ")
        else:
            print("There aren't any products")