/**
 * ClientesVip.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package com.realtoscana.WS_SirloinClients;

import java.math.BigDecimal;

public class MovimientosVip implements java.io.Serializable {
	@Override
	public String toString() {
		return "MovimientosVip [num_vip=" + num_vip + ", doc_vip=" + doc_vip + ", fec_vip=" + fec_vip + ", mon_vip="
				+ mon_vip + ", caj_vip=" + caj_vip + ", det_vip=" + det_vip + ", pto_vip=" + pto_vip + ", __equalsCalc="
				+ __equalsCalc + ", __hashCodeCalc=" + __hashCodeCalc + "]";
	}

	private java.math.BigInteger num_vip;
	private java.lang.String doc_vip;
	private java.util.Date fec_vip;
	private java.math.BigDecimal mon_vip;
	private java.lang.String caj_vip;
	private java.lang.String det_vip;
	private java.math.BigDecimal pto_vip;

	public MovimientosVip() {
	}

	public MovimientosVip(java.math.BigInteger num_vip, java.lang.String doc_vip, java.util.Date fec_vip,
			java.math.BigDecimal mon_vip, java.lang.String caj_vip, java.lang.String det_vip,
			java.math.BigDecimal pto_vip) {
		this.num_vip = num_vip;
		this.fec_vip = fec_vip;
		this.pto_vip = pto_vip;
		this.doc_vip = doc_vip;
		this.mon_vip = mon_vip;
		this.caj_vip = caj_vip;
		this.det_vip = det_vip;

	}

	/**
	 * Gets the num_vip value for this ClientesVip.
	 * 
	 * @return num_vip
	 */
	public java.math.BigInteger getNum_vip() {
		return num_vip;
	}

	/**
	 * Sets the num_vip value for this ClientesVip.
	 * 
	 * @param num_vip
	 */
	public void setNum_vip(java.math.BigInteger num_vip) {
		this.num_vip = num_vip;
	}

	/**
	 * Gets the fec_vip value for this ClientesVip.
	 * 
	 * @return fec_vip
	 */
	public java.util.Date getFec_vip() {
		return fec_vip;
	}

	/**
	 * Sets the fec_vip value for this ClientesVip.
	 * 
	 * @param fec_vip
	 */
	public void setFec_vip(java.util.Date fec_vip) {
		this.fec_vip = fec_vip;
	}

	/**
	 * Gets the sal_vip value for this ClientesVip.
	 * 
	 * @return sal_vip
	 */
	public java.math.BigDecimal getMon_vip() {
		return mon_vip;
	}

	/**
	 * Sets the sal_vip value for this ClientesVip.
	 * 
	 * @param sal_vip
	 */
	public void setMon_vip(java.math.BigDecimal mon_vip) {
		if (mon_vip == BigDecimal.valueOf(0))
			this.mon_vip = null;
		else
			this.mon_vip = mon_vip;
	}

	/**
	 * Gets the pto_vip value for this ClientesVip.
	 * 
	 * @return pto_vip
	 */
	public java.math.BigDecimal getPto_vip() {
		return pto_vip;
	}

	/**
	 * Sets the pto_vip value for this ClientesVip.
	 * 
	 * @param pto_vip
	 */
	public void setPto_vip(java.math.BigDecimal pto_vip) {
		if (pto_vip == BigDecimal.valueOf(0))
			this.pto_vip = null;
		else
			this.pto_vip = pto_vip;
	}

	public java.lang.String getDoc_vip() {
		return doc_vip;
	}

	public void setDoc_vip(java.lang.String doc_vip) {
		this.doc_vip = doc_vip;
	}

	public java.lang.String getCaj_vip() {
		return caj_vip;
	}

	public void setCaj_vip(java.lang.String caj_vip) {
		this.caj_vip = caj_vip;
	}

	public java.lang.String getDet_vip() {
		return det_vip;
	}

	public void setDet_vip(java.lang.String det_vip) {
		this.det_vip = det_vip;
	}

	private java.lang.Object __equalsCalc = null;

	public synchronized boolean equals(java.lang.Object obj) {
		if (!(obj instanceof MovimientosVip))
			return false;
		MovimientosVip other = (MovimientosVip) obj;
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
				&& ((this.num_vip == null && other.getNum_vip() == null)
						|| (this.num_vip != null && this.num_vip.equals(other.getNum_vip())))
				&& ((this.doc_vip == null && other.getDoc_vip() == null)
						|| (this.doc_vip != null && this.doc_vip.equals(other.getDoc_vip())))
				&& ((this.caj_vip == null && other.getCaj_vip() == null)
						|| (this.caj_vip != null && this.caj_vip.equals(other.getCaj_vip())))
				&& ((this.det_vip == null && other.getDet_vip() == null)
						|| (this.det_vip != null && this.det_vip.equals(other.getDet_vip())))
				&& ((this.fec_vip == null && other.getFec_vip() == null)
						|| (this.fec_vip != null && this.fec_vip.equals(other.getFec_vip())))
				&& ((this.mon_vip == null && other.getMon_vip() == null)
						|| (this.mon_vip != null && this.mon_vip.equals(other.getMon_vip())))
				&&

				((this.pto_vip == null && other.getPto_vip() == null)
						|| (this.pto_vip != null && this.pto_vip.equals(other.getPto_vip())));
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
		if (getNum_vip() != null) {
			_hashCode += getNum_vip().hashCode();
		}
		if (getDoc_vip() != null) {
			_hashCode += getDoc_vip().hashCode();
		}
		if (getCaj_vip() != null) {
			_hashCode += getCaj_vip().hashCode();
		}
		if (getDet_vip() != null) {
			_hashCode += getDet_vip().hashCode();
		}
		if (getFec_vip() != null) {
			_hashCode += getFec_vip().hashCode();
		}
		if (getMon_vip() != null) {
			_hashCode += getMon_vip().hashCode();
		}

		if (getPto_vip() != null) {
			_hashCode += getPto_vip().hashCode();
		}

		__hashCodeCalc = false;
		return _hashCode;
	}

	// Type metadata
	private static org.apache.axis.description.TypeDesc typeDesc = new org.apache.axis.description.TypeDesc(
			MovimientosVip.class, true);

	static {
		typeDesc.setXmlType(new javax.xml.namespace.QName("http://realtoscana.com/WS_SirloinClients", "clientesVip"));
		org.apache.axis.description.ElementDesc elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("num_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "num_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "integer"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("doc_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "doc_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("det_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "det_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("caj_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "caj_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("fec_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "fec_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "date"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("mon_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "mon_vip"));
		elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
		elemField.setNillable(true);
		typeDesc.addFieldDesc(elemField);
		elemField = new org.apache.axis.description.ElementDesc();
		elemField.setFieldName("pto_vip");
		elemField.setXmlName(new javax.xml.namespace.QName("", "pto_vip"));
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
