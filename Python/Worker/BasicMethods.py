import pickle


class BasicMethods():
    @staticmethod

    def askinteger(name):
        integer=input("Enter the " + name)
        return integer

    @staticmethod

    def askstring(name):
        string = input("Enter the " + name)
        return string

    @staticmethod
    def readFromFile(fileName):
        inp = open(fileName, 'rb')
        list = []
        cont = 1
        while cont == 1:
            try:
                list.append(pickle.load(inp))
            except EOFError:
                cont = 0
        inp.close()
        return list

    @staticmethod
    def addInFile(obj, filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)

    @staticmethod
    def writeInFile(obj, filename):
        with open(filename, 'wb') as f:
            pickle.dump(obj, f, pickle.HIGHEST_PROTOCOL)