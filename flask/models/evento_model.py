"""
Modelo para la tabla Eventos
"""
from config.database import Database

class EventoModel:
    """Maneja operaciones de base de datos para Eventos"""
    
    @staticmethod
    def get_all():
        """Obtiene todos los eventos con información de lugar y rol"""
        sql = """
        SELECT e.*, l.nombre as lugar_nombre, r.nombre as rol_nombre 
        FROM Eventos e
        LEFT JOIN Lugares l ON e.lugar_id = l.id
        LEFT JOIN RolesOrganizador r ON e.organizador_id = r.id
        ORDER BY e.fecha DESC
        """
        return Database.execute_query(sql, fetch=True) or []
    
    @staticmethod
    def get_by_id(evento_id):
        """Obtiene un evento por su ID"""
        sql = "SELECT * FROM Eventos WHERE id = %s"
        return Database.execute_query(sql, (evento_id,), fetch_one=True)
    
    @staticmethod
    def create(nombre, fecha, lugar_id, organizador_id):
        """Crea un nuevo evento"""
        sql = """
        INSERT INTO Eventos (nombre, fecha, lugar_id, organizador_id) 
        VALUES (%s, %s, %s, %s)
        """
        return Database.execute_query(sql, (nombre, fecha, lugar_id, organizador_id))
    
    @staticmethod
    def update(evento_id, nombre, fecha, lugar_id, organizador_id):
        """Actualiza un evento existente"""
        sql = """
        UPDATE Eventos 
        SET nombre = %s, fecha = %s, lugar_id = %s, organizador_id = %s 
        WHERE id = %s
        """
        return Database.execute_query(sql, (nombre, fecha, lugar_id, organizador_id, evento_id))
    
    @staticmethod
    def delete(evento_id):
        """Elimina un evento"""
        sql = "DELETE FROM Eventos WHERE id = %s"
        return Database.execute_query(sql, (evento_id,))