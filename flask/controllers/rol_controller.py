"""
Controlador para manejar rutas y lógica de Roles
"""
from flask import Blueprint, render_template, request, redirect, url_for, flash
from models.rol_model import RolModel

# Crear Blueprint para roles
rol_bp = Blueprint('rol', __name__, url_prefix='/roles')

@rol_bp.route('/')
def index():
    """Muestra lista de roles"""
    roles = RolModel.get_all()
    return render_template('roles/index.html', roles=roles)

@rol_bp.route('/crear', methods=['GET', 'POST'])
def crear():
    """Crea un nuevo rol"""
    if request.method == 'POST':
        nombre = request.form['nombre']
        
        if not nombre:
            flash('El nombre es obligatorio', 'error')
            return redirect(url_for('rol.crear'))
        
        if RolModel.create(nombre):
            return redirect(url_for('rol.index'))
        else:
            flash('Error al crear el rol', 'error')
    
    return render_template('roles/crear.html')

@rol_bp.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar(id):
    """Edita un rol existente"""
    rol = RolModel.get_by_id(id)
    
   
    if request.method == 'POST':
        nombre = request.form['nombre']
        
        if not nombre:
            flash('El nombre es obligatorio', 'error')
            return redirect(url_for('rol.editar', id=id))
        
        if RolModel.update(id, nombre):
            return redirect(url_for('rol.index'))
        else:
            flash('Error al actualizar el rol', 'error')
    
    return render_template('roles/editar.html', rol=rol)

@rol_bp.route('/eliminar/<int:id>')
def eliminar(id):
    """Elimina un rol"""
    RolModel.delete(id)
    return redirect(url_for('rol.index'))