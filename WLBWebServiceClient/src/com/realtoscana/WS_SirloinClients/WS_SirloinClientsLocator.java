/**
 * WS_SirloinClientsLocator.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package com.realtoscana.WS_SirloinClients;

public class WS_SirloinClientsLocator extends org.apache.axis.client.Service implements com.realtoscana.WS_SirloinClients.WS_SirloinClients {

    public WS_SirloinClientsLocator() {
    }


    public WS_SirloinClientsLocator(org.apache.axis.EngineConfiguration config) {
        super(config);
    }

    public WS_SirloinClientsLocator(java.lang.String wsdlLoc, javax.xml.namespace.QName sName) throws javax.xml.rpc.ServiceException {
        super(wsdlLoc, sName);
    }

    // Use to get a proxy class for WS_SirloinClientsPort
    private java.lang.String WS_SirloinClientsPort_address = "http://realtoscana.com/php/WS_SirloinClients.php";

    public java.lang.String getWS_SirloinClientsPortAddress() {
        return WS_SirloinClientsPort_address;
    }

    // The WSDD service name defaults to the port name.
    private java.lang.String WS_SirloinClientsPortWSDDServiceName = "WS_SirloinClientsPort";

    public java.lang.String getWS_SirloinClientsPortWSDDServiceName() {
        return WS_SirloinClientsPortWSDDServiceName;
    }

    public void setWS_SirloinClientsPortWSDDServiceName(java.lang.String name) {
        WS_SirloinClientsPortWSDDServiceName = name;
    }

    public com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType getWS_SirloinClientsPort() throws javax.xml.rpc.ServiceException {
       java.net.URL endpoint;
        try {
            endpoint = new java.net.URL(WS_SirloinClientsPort_address);
        }
        catch (java.net.MalformedURLException e) {
            throw new javax.xml.rpc.ServiceException(e);
        }
        return getWS_SirloinClientsPort(endpoint);
    }

    public com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType getWS_SirloinClientsPort(java.net.URL portAddress) throws javax.xml.rpc.ServiceException {
        try {
            com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub _stub = new com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub(portAddress, this);
            _stub.setPortName(getWS_SirloinClientsPortWSDDServiceName());
            return _stub;
        }
        catch (org.apache.axis.AxisFault e) {
            return null;
        }
    }

    public void setWS_SirloinClientsPortEndpointAddress(java.lang.String address) {
        WS_SirloinClientsPort_address = address;
    }

    /**
     * For the given interface, get the stub implementation.
     * If this service has no port for the given interface,
     * then ServiceException is thrown.
     */
    public java.rmi.Remote getPort(Class serviceEndpointInterface) throws javax.xml.rpc.ServiceException {
        try {
            if (com.realtoscana.WS_SirloinClients.WS_SirloinClientsPortType.class.isAssignableFrom(serviceEndpointInterface)) {
                com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub _stub = new com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub(new java.net.URL(WS_SirloinClientsPort_address), this);
                _stub.setPortName(getWS_SirloinClientsPortWSDDServiceName());
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
        if ("WS_SirloinClientsPort".equals(inputPortName)) {
            return getWS_SirloinClientsPort();
        }
        else  {
            java.rmi.Remote _stub = getPort(serviceEndpointInterface);
            ((org.apache.axis.client.Stub) _stub).setPortName(portName);
            return _stub;
        }
    }

    public javax.xml.namespace.QName getServiceName() {
        return new javax.xml.namespace.QName("http://realtoscana.com/WS_SirloinClients", "WS_SirloinClients");
    }

    private java.util.HashSet ports = null;

    public java.util.Iterator getPorts() {
        if (ports == null) {
            ports = new java.util.HashSet();
            ports.add(new javax.xml.namespace.QName("http://realtoscana.com/WS_SirloinClients", "WS_SirloinClientsPort"));
        }
        return ports.iterator();
    }

    /**
    * Set the endpoint address for the specified port name.
    */
    public void setEndpointAddress(java.lang.String portName, java.lang.String address) throws javax.xml.rpc.ServiceException {
        
if ("WS_SirloinClientsPort".equals(portName)) {
            setWS_SirloinClientsPortEndpointAddress(address);
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
