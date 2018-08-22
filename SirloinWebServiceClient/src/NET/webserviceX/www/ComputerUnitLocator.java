/**
 * ComputerUnitLocator.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package NET.webserviceX.www;

public class ComputerUnitLocator extends org.apache.axis.client.Service implements NET.webserviceX.www.ComputerUnit {

    public ComputerUnitLocator() {
    }


    public ComputerUnitLocator(org.apache.axis.EngineConfiguration config) {
        super(config);
    }

    public ComputerUnitLocator(java.lang.String wsdlLoc, javax.xml.namespace.QName sName) throws javax.xml.rpc.ServiceException {
        super(wsdlLoc, sName);
    }

    // Use to get a proxy class for ComputerUnitSoap
    private java.lang.String ComputerUnitSoap_address = "http://www.webservicex.net/ConvertComputer.asmx";

    public java.lang.String getComputerUnitSoapAddress() {
        return ComputerUnitSoap_address;
    }

    // The WSDD service name defaults to the port name.
    private java.lang.String ComputerUnitSoapWSDDServiceName = "ComputerUnitSoap";

    public java.lang.String getComputerUnitSoapWSDDServiceName() {
        return ComputerUnitSoapWSDDServiceName;
    }

    public void setComputerUnitSoapWSDDServiceName(java.lang.String name) {
        ComputerUnitSoapWSDDServiceName = name;
    }

    public NET.webserviceX.www.ComputerUnitSoap getComputerUnitSoap() throws javax.xml.rpc.ServiceException {
       java.net.URL endpoint;
        try {
            endpoint = new java.net.URL(ComputerUnitSoap_address);
        }
        catch (java.net.MalformedURLException e) {
            throw new javax.xml.rpc.ServiceException(e);
        }
        return getComputerUnitSoap(endpoint);
    }

    public NET.webserviceX.www.ComputerUnitSoap getComputerUnitSoap(java.net.URL portAddress) throws javax.xml.rpc.ServiceException {
        try {
            NET.webserviceX.www.ComputerUnitSoapStub _stub = new NET.webserviceX.www.ComputerUnitSoapStub(portAddress, this);
            _stub.setPortName(getComputerUnitSoapWSDDServiceName());
            return _stub;
        }
        catch (org.apache.axis.AxisFault e) {
            return null;
        }
    }

    public void setComputerUnitSoapEndpointAddress(java.lang.String address) {
        ComputerUnitSoap_address = address;
    }

    /**
     * For the given interface, get the stub implementation.
     * If this service has no port for the given interface,
     * then ServiceException is thrown.
     */
    public java.rmi.Remote getPort(Class serviceEndpointInterface) throws javax.xml.rpc.ServiceException {
        try {
            if (NET.webserviceX.www.ComputerUnitSoap.class.isAssignableFrom(serviceEndpointInterface)) {
                NET.webserviceX.www.ComputerUnitSoapStub _stub = new NET.webserviceX.www.ComputerUnitSoapStub(new java.net.URL(ComputerUnitSoap_address), this);
                _stub.setPortName(getComputerUnitSoapWSDDServiceName());
                return _stub;
            }
        }
        catch (java.lang.Throwable t) {
            throw new javax.xml.rpc.ServiceException(t);
        }
        throw new javax.xml.rpc.ServiceException("There is no stub implementation for the interface:  " + (serviceEndpointInterface == null ? "null" : serviceEndpointInterface.getName()));
    }

    /**
     * For the given interface, get the stub implementation.
     * If this service has no port for the given interface,
     * then ServiceException is thrown.
     */
    public java.rmi.Remote getPort(javax.xml.namespace.QName portName, Class serviceEndpointInterface) throws javax.xml.rpc.ServiceException {
        if (portName == null) {
            return getPort(serviceEndpointInterface);
        }
        java.lang.String inputPortName = portName.getLocalPart();
        if ("ComputerUnitSoap".equals(inputPortName)) {
            return getComputerUnitSoap();
        }
        else  {
            java.rmi.Remote _stub = getPort(serviceEndpointInterface);
            ((org.apache.axis.client.Stub) _stub).setPortName(portName);
            return _stub;
        }
    }

    public javax.xml.namespace.QName getServiceName() {
        return new javax.xml.namespace.QName("http://www.webserviceX.NET/", "ComputerUnit");
    }

    private java.util.HashSet ports = null;

    public java.util.Iterator getPorts() {
        if (ports == null) {
            ports = new java.util.HashSet();
            ports.add(new javax.xml.namespace.QName("http://www.webserviceX.NET/", "ComputerUnitSoap"));
        }
        return ports.iterator();
    }

    /**
    * Set the endpoint address for the specified port name.
    */
    public void setEndpointAddress(java.lang.String portName, java.lang.String address) throws javax.xml.rpc.ServiceException {
        
if ("ComputerUnitSoap".equals(portName)) {
            setComputerUnitSoapEndpointAddress(address);
        }
        else 
{ // Unknown Port Name
            throw new javax.xml.rpc.ServiceException(" Cannot set Endpoint Address for Unknown Port" + portName);
        }
    }

    /**
    * Set the endpoint address for the specified port name.
    */
    public void setEndpointAddress(javax.xml.namespace.QName portName, java.lang.String address) throws javax.xml.rpc.ServiceException {
        setEndpointAddress(portName.getLocalPart(), address);
    }

}
