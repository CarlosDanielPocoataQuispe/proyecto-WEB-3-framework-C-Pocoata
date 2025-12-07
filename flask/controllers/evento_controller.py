"""
Controlador para manejar rutas y lógica de Eventos
"""
from flask import Blueprint, render_template, request, redirect, url_for, flash
from models.evento_model import EventoModel
from models.lugar_model import LugarModel
from models.rol_model import RolModel

# Crear Blueprint para eventos
evento_bp = Blueprint('evento', __name__, url_prefix='/eventos')

@evento_bp.route('/')
def index():
    """Muestra lista de eventos"""
    eventos = EventoModel.get_all()
    return render_template('eventos/index.html', eventos=eventos)

@evento_bp.route('/crear', methods=['GET', 'POST'])
def crear():
    """Crea un nuevo evento"""
    if request.method == 'POST':
        # Obtener datos del formulario
        nombre = request.form['nombre']
        fecha = request.form['fecha']
        lugar_id = request.form['lugar_id']
        organizador_id = request.form['organizador_id']
        
        # Validar que todos los campos estén completos
        if not all([nombre, fecha, lugar_id, organizador_id]):
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('evento.crear'))
        
        # Intentar crear el evento
        if EventoModel.create(nombre, fecha, lugar_id, organizador_id):
            return redirect(url_for('evento.index'))
        else:
            flash('Error al crear el evento', 'error')
    
    # Si es GET, mostrar formulario con datos necesarios
    lugares = LugarModel.get_all()
    roles = RolModel.get_all()
    return render_template('eventos/crear.html', lugares=lugares, roles=roles)

@evento_bp.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar(id):
    """Edita un evento existente"""
    evento = EventoModel.get_by_id(id)
    

    if request.method == 'POST':
        # Obtener datos del formulario
        nombre = request.form['nombre']
        fecha = request.form['fecha']
        lugar_id = request.form['lugar_id']
        organizador_id = request.form['organizador_id']
        
        # Validar campos
        if not all([nombre, fecha, lugar_id, organizador_id]):
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('evento.editar', id=id))
        
        # Intentar actualizar el evento
        if EventoModel.update(id, nombre, fecha, lugar_id, organizador_id):
            return redirect(url_for('evento.index'))
        else:
            flash('Error al actualizar el evento', 'error')
    
    # Si es GET, mostrar formulario con datos del evento
    lugares = LugarModel.get_all()
    roles = RolModel.get_all()
    return render_template('eventos/editar.html', evento=evento, lugares=lugares, roles=roles)

@evento_bp.route('/eliminar/<int:id>')
def eliminar(id):
    """Elimina un evento"""
    EventoModel.delete(id)
    return redirect(url_for('evento.index'))