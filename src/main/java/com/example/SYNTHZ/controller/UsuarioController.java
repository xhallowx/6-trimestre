package com.example.SYNTHZ.controller;

import com.example.SYNTHZ.entity.Usuario;
import com.example.SYNTHZ.service.UsuarioService;
import org.aspectj.lang.reflect.UnlockSignature;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping(path = "api/v1/usuarios")
public class UsuarioController {

    @Autowired

    private UsuarioService usuarioService;

    @GetMapping
    public List<Usuario> getAll(){
        return usuarioService.getUsuarios();
    }

    @GetMapping("/{usuarioId}")
    public Optional<Usuario> getBId(@PathVariable("usuarioId") Long usuarioId){
        return usuarioService.getUsuario(usuarioId);
    }

    @PostMapping
    public Usuario saveUpdate(@RequestBody Usuario usuario){
        usuarioService.saveOrUpdate(usuario);
        return usuario;
    }
    @DeleteMapping("/{usuarioId}")
    public void saveUpdate(@PathVariable("usuarioId") Long usuarioId){
        usuarioService.delete(usuarioId);
    }
}
