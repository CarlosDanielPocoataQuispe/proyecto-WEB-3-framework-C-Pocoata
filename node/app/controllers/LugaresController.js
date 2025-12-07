 const LugarModel = require('../models/LugarModel');

class LugaresController {
    async index(req, res) {
        try {
            console.log('📋 Obteniendo lugares...');
            const lugares = await LugarModel.findAll();
            console.log(`✅ Encontrados ${lugares.length} lugares`);
            res.render('lugares/index', {
                registros: lugares,
                titulo: 'Lugares',
                tipo: 'lugares'
            });
        } catch (error) {
            console.error('Error en LugaresController.index:', error.message);
            res.status(500).send('Error interno del servidor');
        }
    }

    async crear(req, res) {
        console.log('Mostrando formulario para crear lugar');
        res.render('lugares/crear', {
            titulo: 'Crear Lugar',
            tipo: 'lugares'
        });
    }

    async guardar(req, res) {
        try {
            console.log('Guardando nuevo lugar:', req.body);
            await LugarModel.create(req.body);
            res.redirect('/lugares');
        } catch (error) {
            console.error('Error en LugaresController.guardar:', error.message);
            res.status(500).send('Error al guardar lugar');
        }
    }

    async editar(req, res) {
        try {
            console.log('Editando lugar ID:', req.params.id);
            const lugar = await LugarModel.findById(req.params.id);
            res.render('lugares/editar', {
                registro: lugar,
                titulo: 'Editar Lugar',
                tipo: 'lugares'
            });
        } catch (error) {
            console.error('Error en LugaresController.editar:', error.message);
            res.status(500).send('Error interno del servidor');
        }
    }

    async actualizar(req, res) {
        try {
            console.log('🔄 Actualizando lugar ID:', req.params.id, 'con datos:', req.body);
            await LugarModel.update(req.params.id, req.body);
            res.redirect('/lugares');
        } catch (error) {
            console.error('Error en LugaresController.actualizar:', error.message);
            res.status(500).send('Error al actualizar lugar');
        }
    }

    async eliminar(req, res) {
        try {
            console.log('🗑️ Eliminando lugar ID:', req.params.id);
            await LugarModel.delete(req.params.id);
            res.redirect('/lugares');
        } catch (error) {
            console.error('Error en LugaresController.eliminar:', error.message);
            res.status(500).send('Error al eliminar lugar');
        }
    }
}

// EXPORTACIÓN CORRECTA
module.exports = new LugaresController();