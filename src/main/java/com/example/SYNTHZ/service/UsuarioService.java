package com.example.SYNTHZ.service;

import com.example.SYNTHZ.entity.Usuario;
import com.example.SYNTHZ.repository.UsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class UsuarioService {
    @Autowired
    UsuarioRepository usuarioRepository;
    public List<Usuario> getUsuarios (){
        return usuarioRepository.findAll();
    }
    public Optional<Usuario> getUsuario (Long id){
        return usuarioRepository.findById(id);
    }

    public void saveOrUpdate(Usuario usuario){
        usuarioRepository.save(usuario);
    }public void delete(Long id){
        usuarioRepository.deleteById(id);
    }

}
