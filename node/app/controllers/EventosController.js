const EventoModel = require('../models/EventoModel');
const LugarModel = require('../models/LugarModel');
const RolModel = require('../models/RolModel');

class EventosController {
    async index(req, res) {
        try {
            const eventos = await EventoModel.findAll();
            res.render('eventos/index', {
                registros: eventos,
                titulo: 'Eventos',
                tipo: 'eventos'
            });
        } catch (error) {
            console.error('Error en EventosController.index:', error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async crear(req, res) {
        try {
            const lugares = await LugarModel.findAll();
            const roles = await RolModel.findAll();
            
            res.render('eventos/crear', {
                lugares: lugares,
                roles: roles,
                titulo: 'Crear Evento',
                tipo: 'eventos'
            });
        } catch (error) {
            console.error('Error en EventosController.crear:', error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async guardar(req, res) {
        try {
            await EventoModel.create(req.body);
            res.redirect('/eventos');
        } catch (error) {
            console.error('Error en EventosController.guardar:', error);
            res.status(500).send('Error al guardar evento');
        }
    }

    async editar(req, res) {
        try {
            const evento = await EventoModel.findById(req.params.id);
            const lugares = await LugarModel.findAll();
            const roles = await RolModel.findAll();
            
            res.render('eventos/editar', {
                registro: evento,
                lugares: lugares,
                roles: roles,
                titulo: 'Editar Evento',
                tipo: 'eventos'
            });
        } catch (error) {
            console.error('Error en EventosController.editar:', error);
            res.status(500).send('Error interno del servidor');
        }
    }

    async actualizar(req, res) {
        try {
            await EventoModel.update(req.params.id, req.body);
            res.redirect('/eventos');
        } catch (error) {
            console.error('Error en EventosController.actualizar:', error);
            res.status(500).send('Error al actualizar evento');
        }
    }

    async eliminar(req, res) {
        try {
            await EventoModel.delete(req.params.id);
            res.redirect('/eventos');
        } catch (error) {
            console.error('Error en EventosController.eliminar:', error);
            res.status(500).send('Error al eliminar evento');
        }
    }
}

module.exports = new EventosController();