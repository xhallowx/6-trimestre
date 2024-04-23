package com.example.SYNTHZ.entity;

import jakarta.persistence.*;
import lombok.Data;
import lombok.Generated;

@Data
@Entity
@Table(name = "tbl_usuario")
public class Usuario {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long usuarioId;
    private String firtsname;
    private String lastname;
    @Column(name = "email_address", unique = true, nullable = false)
    private String email;

}