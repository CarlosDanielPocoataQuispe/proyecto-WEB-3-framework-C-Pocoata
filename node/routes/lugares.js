const express = require('express');
const router = express.Router();
const LugaresController = require('../app/controllers/LugaresController');

// Rutas para lugares
router.get('/', LugaresController.index);
router.get('/crear', LugaresController.crear);
router.post('/guardar', LugaresController.guardar);
router.get('/editar/:id', LugaresController.editar);
router.post('/actualizar/:id', LugaresController.actualizar);
router.get('/eliminar/:id', LugaresController.eliminar);

module.exports = router;