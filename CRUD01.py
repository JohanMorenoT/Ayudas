import pymysql
import os 

def bienvenida():
    print("==========================================================")
    print("Que desea realizar?: ")
    print("1).Agregar")
    print("2).Mostrar")
    print("3).Editar")
    print("4).Eliminar")
    print("5).Salir")
    print("==========================================================")
    opcion = int(input(": "))
    if opcion == 1:
        print(aplicacion.Insertar())
    elif opcion == 2:
        print(aplicacion.Mostrar())
    elif opcion == 3:
        print(aplicacion.ModificarN())
    elif opcion == 4:
        print(aplicacion.Eliminar())


class App: 

    def __init__(self):
        self.conn = pymysql.connect(
            host='localhost',
            port=3306,
            user='root',
            password='04112003bj',
            db='crud_1'
        )
        self.cursor = self.conn.cursor()

    def Insertar(self):
        name = input("Ingrese su nombre: ")
        edad = input("Ingrese su edad: ")
        sql = "INSERT INTO usuarios(nombre,edad) VALUES ('{}','{}')".format(name,edad)
        self.cursor.execute(sql)
        print("Nombre y edad ingresados correctamente.")
        self.conn.commit()
        os.system('pause')

    def Mostrar(self):
        sql = "SELECT * FROM usuarios"
        self.cursor.execute(sql)
        personas = self.cursor.fetchall()
        for i in personas:
            print("Nombre: ", i[1] , "- Edad: ", i[2])

    def ModificarN(self):
        nombre = input("Ingrese el nobre al reemplazar: ")
        nuevo_nombre = input("Ingrese el nuevo nombre: ")
        sql = "UPDATE usuarios set nombre = '{}'".format(nuevo_nombre, nombre)
        self.cursor.execute(sql)
        self.conn.commit()
        print("Su nombre fue modificado.")

    def ModificarE(self):
        Edad = input("Ingrese la edad a reemplazar: ")
        nueva_edad = input("Ingrese la nueva edad: ")
        sql = "UPDATE usuarios set edad = '{}'".format(nueva_edad, Edad)
        self.cursor.execute(sql)
        self.conn.commit()
        print("Su edad fue modificada.")

    def Eliminar(self):
         element = input("Ingrese el dato a eliminar: ")
         sql = "DELETE FROM usuarios WHERE nombre ='{}'".format(element)
         self.cursor.execute(sql)
         print("Dato Eliminado.")
         self.conn.commit()    


aplicacion = App()
#aplicacion.ModificarE()

bienvenida()
