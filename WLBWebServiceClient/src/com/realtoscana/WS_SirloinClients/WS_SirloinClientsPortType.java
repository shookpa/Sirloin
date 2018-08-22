/**
 * WS_SirloinClientsPortType.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package com.realtoscana.WS_SirloinClients;

public interface WS_SirloinClientsPortType extends java.rmi.Remote {

    /**
     * Lista total de Clientes VIP
     */
    public com.realtoscana.WS_SirloinClients.ClientesVip[] listarClientes(com.realtoscana.WS_SirloinClients.AccountWS cuenta) throws java.rmi.RemoteException;

    /**
     * Lista de Clientes agregados en el dia
     */
    public com.realtoscana.WS_SirloinClients.ClientesVip[] listarClientesDelDia(com.realtoscana.WS_SirloinClients.AccountWS cuenta) throws java.rmi.RemoteException;

    /**
     * Agregar nuevos clientes VIP
     */
    public java.lang.String agregarClientes(com.realtoscana.WS_SirloinClients.AccountWS cuenta, com.realtoscana.WS_SirloinClients.ClientesVip[] listaClientes) throws java.rmi.RemoteException;
    /**
     * Agregar nuevos movimientos VIP
     */
    public java.lang.String agregarMovimientos(com.realtoscana.WS_SirloinClients.AccountWS cuenta, com.realtoscana.WS_SirloinClients.MovimientosVip[] listaMovimientos) throws java.rmi.RemoteException;
}
