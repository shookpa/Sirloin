/**
 * ClientesVip.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package com.realtoscana.WS_SirloinClients;

import java.math.BigDecimal;
import java.util.Date;

public class FacturasVip implements java.io.Serializable {
	
	public FacturasVip(Date fecha, String descrip, String factura, String orden, String numero) {
		super();
		this.fecha = fecha;
		this.descrip = descrip;
		this.factura = factura;
		this.orden = orden;
		this.numero = numero;
	}

	public FacturasVip() {
		// TODO Auto-generated constructor stub
	}



	public java.util.Date getFecha() {
		return fecha;
	}

	public void setFecha(java.util.Date fecha) {
		this.fecha = fecha;
	}

	public java.lang.String getDescrip() {
		return descrip;
	}

	public void setDescrip(java.lang.String descrip) {
		this.descrip = descrip;
	}

	public java.lang.String getFactura() {
		return factura;
	}

	public void setFactura(java.lang.String factura) {
		this.factura = factura;
	}

	public java.lang.String getOrden() {
		return orden;
	}

	public void setOrden(java.lang.String orden) {
		this.orden = orden;
	}

	public java.lang.String getNumero() {
		return numero;
	}

	public void setNumero(java.lang.String numero) {
		this.numero = numero;
	}
	public java.math.BigDecimal getTotalf() {
		return totalf;
	}

	public void setTotalf(java.math.BigDecimal totalf) {
		this.totalf = totalf;
	}
	@Override
	public String toString() {
		return "FacturasVip [getFecha()=" + getFecha() + ", getDescrip()=" + getDescrip() + ", getFactura()="
				+ getFactura() + ", getOrden()=" + getOrden() + ", getNumero()=" + getNumero() + ", getTotalf()="
				+ getTotalf() + "]";
	}
	private java.util.Date fecha;
	private java.lang.String descrip;	
	private java.lang.String factura;
	private java.lang.String orden;
	private java.lang.String numero;
	private java.math.BigDecimal totalf;

	

	

	private java.lang.Object __equalsCalc = null;

	public synchronized boolean equals(java.lang.Object obj) {
		if (!(obj instanceof FacturasVip))
			return false;
		FacturasVip other = (FacturasVip) obj;
		if (obj == null)
			return false;
		if (this == obj)
			return true;
		if (__equalsCalc != null) {
			return (__equalsCalc == obj);
		}
		__equalsCalc = obj;
		boolean _equals;
		_equals = true
				&& ((this.fecha == null && other.getFecha() == null)
						|| (this.fecha != null && this.fecha.equals(other.getFecha())))
				&& ((this.descrip == null && other.getDescrip() == null)
						|| (this.descrip != null && this.descrip.equals(other.getDescrip())))
				&& ((this.factura == null && other.getFactura() == null)
						|| (this.factura!= null && this.factura.equals(other.getFactura())))
				&& ((this.orden == null && other.getOrden() == null)
						|| (this.orden != null && this.orden.equals(other.getOrden())))
				&& ((this.numero == null && other.getNumero() == null)
						|| (this.numero != null && this.numero.equals(other.getNumero())))
				&& ((this.totalf == null && other.getTotalf() == null)
						|| (this.totalf != null && this.totalf.equals(other.getTotalf())))
				;
		__equalsCalc = null;	
		return _equals;
	}

	private boolean __hashCodeCalc = false;

	public synchronized int hashCode() {
		if (__hashCodeCalc) {
			return 0;
		}
		__hashCodeCalc = true;
		int _hashCode = 1;
		if (getFecha() != null) {
			_hashCode += getFecha().hashCode();
		}
		if (getDescrip() != null) {
			_hashCode += getDescrip().hashCode();
		}
		if (getOrden() != null) {
			_hashCode += getOrden().hashCode();
		}
		if (getFactura() != null) {
			_hashCode += getFactura().hashCode();
		}
		if (getNumero() != null) {
			_hashCode += getNumero().hashCode();
		}
		if (getTotalf() != null) {
			_hashCode += getTotalf().hashCode();
		}

		__hashCodeCalc = false;
		return _hashCode;
	}

	// Type metadata
	private static org.apache.axis.description.TypeDesc typeDesc = new org.apache.axis.description.TypeDesc(
			FacturasVip.class, true);

	static {
		typeDesc.setXmlType(new javax.xml.namespace.QName("http://realtoscana.com/WS_SirloinClients", "clientesVip"));
		org.apache.axis.description.ElementDesc elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("fecha");
		elemField.setXmlName(new javax.xml.namespace.QName("", "fecha"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "date"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("descrip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "descrip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("orden");
		elemField.setXmlName(new javax.xml.namespace.QName("", "orden"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("factura");
		elemField.setXmlName(new javax.xml.namespace.QName("", "factura"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("numero");
		elemField.setXmlName(new javax.xml.namespace.QName("", "numero"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		//el campo del totalf
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("totalf");
		elemField.setXmlName(new javax.xml.namespace.QName("", "totalf"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);

	}

	/**
	 * Return type metadata object
	 */
	public static org.apache.axis.description.TypeDesc getTypeDesc() {
		return typeDesc;
	}

	/**
	 * Get Custom Serializer
	 */
	public static org.apache.axis.encoding.Serializer getSerializer(java.lang.String mechType,
			java.lang.Class _javaType, javax.xml.namespace.QName _xmlType) {
		return new org.apache.axis.encoding.ser.BeanSerializer(_javaType, _xmlType, typeDesc);
	}

	/**
	 * Get Custom Deserializer
	 */
	public static org.apache.axis.encoding.Deserializer getDeserializer(java.lang.String mechType,
			java.lang.Class _javaType, javax.xml.namespace.QName _xmlType) {
		return new org.apache.axis.encoding.ser.BeanDeserializer(_javaType, _xmlType, typeDesc);
	}

}
