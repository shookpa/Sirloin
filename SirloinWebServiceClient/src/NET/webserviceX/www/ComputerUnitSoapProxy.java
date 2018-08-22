package NET.webserviceX.www;

public class ComputerUnitSoapProxy implements NET.webserviceX.www.ComputerUnitSoap {
  private String _endpoint = null;
  private NET.webserviceX.www.ComputerUnitSoap computerUnitSoap = null;
  
  public ComputerUnitSoapProxy() {
    _initComputerUnitSoapProxy();
  }
  
  public ComputerUnitSoapProxy(String endpoint) {
    _endpoint = endpoint;
    _initComputerUnitSoapProxy();
  }
  
  private void _initComputerUnitSoapProxy() {
    try {
      computerUnitSoap = (new NET.webserviceX.www.ComputerUnitLocator()).getComputerUnitSoap();
      if (computerUnitSoap != null) {
        if (_endpoint != null)
          ((javax.xml.rpc.Stub)computerUnitSoap)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
        else
          _endpoint = (String)((javax.xml.rpc.Stub)computerUnitSoap)._getProperty("javax.xml.rpc.service.endpoint.address");
      }
      
    }
    catch (javax.xml.rpc.ServiceException serviceException) {}
  }
  
  public String getEndpoint() {
    return _endpoint;
  }
  
  public void setEndpoint(String endpoint) {
    _endpoint = endpoint;
    if (computerUnitSoap != null)
      ((javax.xml.rpc.Stub)computerUnitSoap)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
    
  }
  
  public NET.webserviceX.www.ComputerUnitSoap getComputerUnitSoap() {
    if (computerUnitSoap == null)
      _initComputerUnitSoapProxy();
    return computerUnitSoap;
  }
  
  public double changeComputerUnit(double computerValue, NET.webserviceX.www.Computers fromComputerUnit, NET.webserviceX.www.Computers toComputerUnit) throws java.rmi.RemoteException{
    if (computerUnitSoap == null)
      _initComputerUnitSoapProxy();
    return computerUnitSoap.changeComputerUnit(computerValue, fromComputerUnit, toComputerUnit);
  }
  
  
}