"""
Controlador para manejar rutas y lógica de Lugares
"""
from flask import Blueprint, render_template, request, redirect, url_for, flash
from models.lugar_model import LugarModel

# Crear Blueprint para lugares
lugar_bp = Blueprint('lugar', __name__, url_prefix='/lugares')

@lugar_bp.route('/')
def index():
    """Muestra lista de lugares"""
    lugares = LugarModel.get_all()
    return render_template('lugares/index.html', lugares=lugares)

@lugar_bp.route('/crear', methods=['GET', 'POST'])
def crear():
    """Crea un nuevo lugar"""
    if request.method == 'POST':
        nombre = request.form['nombre']
        direccion = request.form['direccion']
        
        if not nombre or not direccion:
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('lugar.crear'))
        
        if LugarModel.create(nombre, direccion):
            return redirect(url_for('lugar.index'))
        else:
            flash('Error al crear el lugar', 'error')
    
    return render_template('lugares/crear.html')

@lugar_bp.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar(id):
    """Edita un lugar existente"""
    lugar = LugarModel.get_by_id(id)
    
    if request.method == 'POST':
        nombre = request.form['nombre']
        direccion = request.form['direccion']
        
        if not nombre or not direccion:
            flash('Todos los campos son obligatorios', 'error')
            return redirect(url_for('lugar.editar', id=id))
        
        if LugarModel.update(id, nombre, direccion):
            return redirect(url_for('lugar.index'))
        else:
            flash('Error al actualizar el lugar', 'error')
    
    return render_template('lugares/editar.html', lugar=lugar)

@lugar_bp.route('/eliminar/<int:id>')
def eliminar(id):
    """Elimina un lugar"""
    LugarModel.delete(id)
    return redirect(url_for('lugar.index'))