package com.realtoscana.WS_SirloinClients;

public class WS_SirloinClientsPortTypeProxy implements com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType {
  private String _endpoint = null;
  private com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType wS_SirloinClientsPortType = null;
  
  public WS_SirloinClientsPortTypeProxy() {
    _initWS_SirloinClientsPortTypeProxy();
  }
  
  public WS_SirloinClientsPortTypeProxy(String endpoint) {
    _endpoint = endpoint;
    _initWS_SirloinClientsPortTypeProxy();
  }
  
  private void _initWS_SirloinClientsPortTypeProxy() {
    try {
      wS_SirloinClientsPortType = (new com.realtoscana.WS_SirloinClients.WS_SirloinClientsLocator()).getWS_SirloinClientsPort();
      if (wS_SirloinClientsPortType != null) {
        if (_endpoint != null)
          ((javax.xml.rpc.Stub)wS_SirloinClientsPortType)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
        else
          _endpoint = (String)((javax.xml.rpc.Stub)wS_SirloinClientsPortType)._getProperty("javax.xml.rpc.service.endpoint.address");
      }
      
    }
    catch (javax.xml.rpc.ServiceException serviceException) {}
  }
  
  public String getEndpoint() {
    return _endpoint;
  }
  
  public void setEndpoint(String endpoint) {
    _endpoint = endpoint;
    if (wS_SirloinClientsPortType != null)
      ((javax.xml.rpc.Stub)wS_SirloinClientsPortType)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
    
  }
  
  public com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType getWS_SirloinClientsPortType() {
    if (wS_SirloinClientsPortType == null)
      _initWS_SirloinClientsPortTypeProxy();
    return wS_SirloinClientsPortType;
  }
  
  public com.realtoscana.WS_SirloinClients.ClientesVip[] listarClientes(com.realtoscana.WS_SirloinClients.AccountWS cuenta) throws java.rmi.RemoteException{
    if (wS_SirloinClientsPortType == null)
      _initWS_SirloinClientsPortTypeProxy();
    return wS_SirloinClientsPortType.listarClientes(cuenta);
  }
  
  public com.realtoscana.WS_SirloinClients.ClientesVip[] listarClientesDelDia(com.realtoscana.WS_SirloinClients.AccountWS cuenta) throws java.rmi.RemoteException{
    if (wS_SirloinClientsPortType == null)
      _initWS_SirloinClientsPortTypeProxy();
    return wS_SirloinClientsPortType.listarClientesDelDia(cuenta);
  }
  
  public java.lang.String agregarClientes(com.realtoscana.WS_SirloinClients.AccountWS cuenta, com.realtoscana.WS_SirloinClients.ClientesVip[] listaClientes) throws java.rmi.RemoteException{
    if (wS_SirloinClientsPortType == null)
      _initWS_SirloinClientsPortTypeProxy();
    return wS_SirloinClientsPortType.agregarClientes(cuenta, listaClientes);
  }
  
  public java.lang.String agregarMovimientos(com.realtoscana.WS_SirloinClients.AccountWS cuenta, com.realtoscana.WS_SirloinClients.MovimientosVip[] listaMovimientos) throws java.rmi.RemoteException{
	    if (wS_SirloinClientsPortType == null)
	      _initWS_SirloinClientsPortTypeProxy();
	    return wS_SirloinClientsPortType.agregarMovimientos(cuenta, listaMovimientos);
	  }
  
  
}