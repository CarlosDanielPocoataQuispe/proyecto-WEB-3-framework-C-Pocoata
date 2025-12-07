"""
Controlador para manejar rutas y lógica de Asistentes
"""
from flask import Blueprint, render_template, request, redirect, url_for, flash
from models.asistente_model import AsistenteModel
from models.evento_model import EventoModel

# Crear Blueprint pAra asistentes
asistente_bp = Blueprint('asistente', __name__, url_prefix='/asistentes')

@asistente_bp.route('/')
def index():
    """Muestra lista de asistentes"""
    asistentes = AsistenteModel.get_all()
    return render_template('asistentes/index.html', asistentes=asistentes)

@asistente_bp.route('/crear', methods=['GET', 'POST'])
def crear():
    """Crea un nuevo asistente"""
    if request.method == 'POST':
        nombre = request.form['nombre']
        contacto = request.form['contacto']
        evento_id = request.form['evento_id']
        
        if not all([nombre, contacto, evento_id]):
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('asistente.crear'))
        
        if AsistenteModel.create(nombre, contacto, evento_id):
            return redirect(url_for('asistente.index'))
        else:
            flash('Error al crear el asistente', 'error')
    
    eventos = EventoModel.get_all()
    return render_template('asistentes/crear.html', eventos=eventos)

@asistente_bp.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar(id):
    """Edita un asistente existente"""
    asistente = AsistenteModel.get_by_id(id)
    
    if request.method == 'POST':
        nombre = request.form['nombre']
        contacto = request.form['contacto']
        evento_id = request.form['evento_id']
        
        if not all([nombre, contacto, evento_id]):
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('asistente.editar', id=id))
        
        if AsistenteModel.update(id, nombre, contacto, evento_id):
            return redirect(url_for('asistente.index'))
        else:
            flash('Error al actualizar el asistente', 'error')
    
    eventos = EventoModel.get_all()
    return render_template('asistentes/editar.html', asistente=asistente, eventos=eventos)

@asistente_bp.route('/eliminar/<int:id>')
def eliminar(id):
    """Elimina un asistente"""
    AsistenteModel.delete(id)
    
    return redirect(url_for('asistente.index'))