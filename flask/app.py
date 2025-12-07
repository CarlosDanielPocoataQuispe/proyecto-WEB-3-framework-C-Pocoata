"""
Punto de entrada principal de la aplicación Flask
Aquí se configuran todas las rutas
"""
from flask import Flask, render_template
from controllers.evento_controller import evento_bp
from controllers.lugar_controller import lugar_bp
from controllers.rol_controller import rol_bp
from controllers.asistente_controller import asistente_bp

# Crear aplicación Flask
app = Flask(__name__)
app.secret_key = 'clave_secreta_flask'

# Registrar Blueprints (módulos)
app.register_blueprint(evento_bp)
app.register_blueprint(lugar_bp)
app.register_blueprint(rol_bp)
app.register_blueprint(asistente_bp)

# Ruta principal - Redirige a eventos
@app.route('/')
def inicio():
    """Página principal"""
    return render_template('eventos/index.html')

# Ejecutar aplicación
if __name__ == '__main__':
    print("Servidor Flask iniciado en http://localhost:5000")
    app.run(debug=True, port=5000)