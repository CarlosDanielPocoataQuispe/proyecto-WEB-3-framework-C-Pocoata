const express = require('express');
const router = express.Router();
const RolesController = require('../app/controllers/RolesController');

// Rutas para roles
router.get('/', RolesController.index);
router.get('/crear', RolesController.crear);
router.post('/guardar', RolesController.guardar);
router.get('/editar/:id', RolesController.editar);
router.post('/actualizar/:id', RolesController.actualizar);
router.get('/eliminar/:id', RolesController.eliminar);

module.exports = router;