/**
 * ClientesVip.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package com.realtoscana.WS_SirloinClients;

import java.math.BigDecimal;

public class ClientesVip  implements java.io.Serializable {
    private java.math.BigInteger num_vip;

    private java.lang.String nom_vip;

    private java.lang.String tel_vip;

    private java.lang.String ema_vip;

    private java.util.Date fec_vip;

    private java.math.BigDecimal sal_vip;

    private java.util.Date fuc_vip;

    private java.math.BigDecimal muc_vip;

    private java.util.Date fup_vip;

    private java.math.BigDecimal mup_vip;

    private java.math.BigInteger tnr_vip;

    private java.math.BigDecimal tmr_vip;

    private java.math.BigDecimal tct_vip;

    private java.math.BigDecimal pto_vip;

    private java.math.BigDecimal pva_vip;
    
    private java.lang.String datetime_vip;

    public ClientesVip() {
    }

    public ClientesVip(
           java.math.BigInteger num_vip,
           java.lang.String nom_vip,         
           java.lang.String tel_vip,
           java.lang.String ema_vip,
           java.util.Date fec_vip,
           java.math.BigDecimal sal_vip,
           java.util.Date fuc_vip,
           java.math.BigDecimal muc_vip,
           java.util.Date fup_vip,
           java.math.BigDecimal mup_vip,
           java.math.BigInteger tnr_vip,
           java.math.BigDecimal tmr_vip,
           java.math.BigDecimal tct_vip,
           java.math.BigDecimal pto_vip,
           java.math.BigDecimal pva_vip,  
           java.lang.String datetime_vip) {
           this.num_vip = num_vip;
           this.nom_vip = nom_vip;
           this.tel_vip = tel_vip;
           this.ema_vip = ema_vip;
           this.fec_vip = fec_vip;
           this.sal_vip = sal_vip;
           this.fuc_vip = fuc_vip;
           this.muc_vip = muc_vip;
           this.fup_vip = fup_vip;
           this.mup_vip = mup_vip;
           this.tnr_vip = tnr_vip;
           this.tmr_vip = tmr_vip;
           this.tct_vip = tct_vip;
           this.pto_vip = pto_vip;
           this.pva_vip = pva_vip;
           this.datetime_vip = datetime_vip;
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
     * Gets the nom_vip value for this ClientesVip.
     * 
     * @return nom_vip
     */
    public java.lang.String getNom_vip() {
        return nom_vip;
    }


    /**
     * Sets the nom_vip value for this ClientesVip.
     * 
     * @param nom_vip
     */
    public void setNom_vip(java.lang.String nom_vip) {
        this.nom_vip = nom_vip;
    }


    /**
     * Gets the tel_vip value for this ClientesVip.
     * 
     * @return tel_vip
     */
    public java.lang.String getTel_vip() {
        return tel_vip;
    }


    /**
     * Sets the tel_vip value for this ClientesVip.
     * 
     * @param tel_vip
     */
    public void setTel_vip(java.lang.String tel_vip) {
        this.tel_vip = tel_vip;
    }


    /**
     * Gets the ema_vip value for this ClientesVip.
     * 
     * @return ema_vip
     */
    public java.lang.String getEma_vip() {
        return ema_vip;
    }


    /**
     * Sets the ema_vip value for this ClientesVip.
     * 
     * @param ema_vip
     */
    public void setEma_vip(java.lang.String ema_vip) {
        this.ema_vip = ema_vip;
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
    public java.math.BigDecimal getSal_vip() {
        return sal_vip;
    }


    /**
     * Sets the sal_vip value for this ClientesVip.
     * 
     * @param sal_vip
     */
    public void setSal_vip(java.math.BigDecimal sal_vip) {
    	if (sal_vip == BigDecimal.valueOf(0))
    		this.sal_vip =null;
    	else
    		this.sal_vip = sal_vip;
    }


    /**
     * Gets the fuc_vip value for this ClientesVip.
     * 
     * @return fuc_vip
     */
    public java.util.Date getFuc_vip() {
        return fuc_vip;
    }


    /**
     * Sets the fuc_vip value for this ClientesVip.
     * 
     * @param fuc_vip
     */
    public void setFuc_vip(java.util.Date fuc_vip) {
        this.fuc_vip = fuc_vip;
    }


    /**
     * Gets the muc_vip value for this ClientesVip.
     * 
     * @return muc_vip
     */
    public java.math.BigDecimal getMuc_vip() {
        return muc_vip;
    }


    /**
     * Sets the muc_vip value for this ClientesVip.
     * 
     * @param muc_vip
     */
    public void setMuc_vip(java.math.BigDecimal muc_vip) {
    	if (muc_vip == BigDecimal.valueOf(0))
    		this.muc_vip =null;
    	else
    		this.muc_vip = muc_vip;
        
    }


    /**
     * Gets the fup_vip value for this ClientesVip.
     * 
     * @return fup_vip
     */
    public java.util.Date getFup_vip() {
        return fup_vip;
    }


    /**
     * Sets the fup_vip value for this ClientesVip.
     * 
     * @param fup_vip
     */
    public void setFup_vip(java.util.Date fup_vip) {
        this.fup_vip = fup_vip;
    }


    /**
     * Gets the mup_vip value for this ClientesVip.
     * 
     * @return mup_vip
     */
    public java.math.BigDecimal getMup_vip() {
        return mup_vip;
    }


    /**
     * Sets the mup_vip value for this ClientesVip.
     * 
     * @param mup_vip
     */
    public void setMup_vip(java.math.BigDecimal mup_vip) {
        if (mup_vip == BigDecimal.valueOf(0))
    		this.mup_vip =null;
    	else
    		this.mup_vip = mup_vip;
    }


    /**
     * Gets the tnr_vip value for this ClientesVip.
     * 
     * @return tnr_vip
     */
    public java.math.BigInteger getTnr_vip() {
        return tnr_vip;
    }


    /**
     * Sets the tnr_vip value for this ClientesVip.
     * 
     * @param tnr_vip
     */
    public void setTnr_vip(java.math.BigInteger tnr_vip) {
        this.tnr_vip = tnr_vip;
    }


    /**
     * Gets the tmr_vip value for this ClientesVip.
     * 
     * @return tmr_vip
     */
    public java.math.BigDecimal getTmr_vip() {
        return tmr_vip;
    }


    /**
     * Sets the tmr_vip value for this ClientesVip.
     * 
     * @param tmr_vip
     */
    public void setTmr_vip(java.math.BigDecimal tmr_vip) {        
        if (tmr_vip == BigDecimal.valueOf(0))
    		this.tmr_vip =null;
    	else
    		this.tmr_vip = tmr_vip;
    }


    /**
     * Gets the tct_vip value for this ClientesVip.
     * 
     * @return tct_vip
     */
    public java.math.BigDecimal getTct_vip() {
        return tct_vip;
    }


    /**
     * Sets the tct_vip value for this ClientesVip.
     * 
     * @param tct_vip
     */
    public void setTct_vip(java.math.BigDecimal tct_vip) {        
        if (tct_vip == BigDecimal.valueOf(0))
    		this.tct_vip =null;
    	else
    		this.tct_vip = tct_vip;
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
    		this.pto_vip =null;
    	else
    		this.pto_vip = pto_vip;
    }


    /**
     * Gets the pva_vip value for this ClientesVip.
     * 
     * @return pva_vip
     */
    public java.math.BigDecimal getPva_vip() {
        return pva_vip;
    }


    /**
     * Sets the pva_vip value for this ClientesVip.
     * 
     * @param pva_vip
     */
    public void setPva_vip(java.math.BigDecimal pva_vip) {
        
        if (pva_vip == BigDecimal.valueOf(0))
    		this.pva_vip =null;
    	else
    		this.pva_vip = pva_vip;
    }
    
    public java.lang.String getDatetime_vip() {
		return datetime_vip;
	}

	public void setDatetime_vip(java.lang.String datetime_vip) {
		this.datetime_vip = datetime_vip;
	}

    

    private java.lang.Object __equalsCalc = null;
    public synchronized boolean equals(java.lang.Object obj) {
        if (!(obj instanceof ClientesVip)) return false;
        ClientesVip other = (ClientesVip) obj;
        if (obj == null) return false;
        if (this == obj) return true;
        if (__equalsCalc != null) {
            return (__equalsCalc == obj);
        }
        __equalsCalc = obj;
        boolean _equals;
        _equals = true && 
            ((this.num_vip==null && other.getNum_vip()==null) || 
             (this.num_vip!=null &&
              this.num_vip.equals(other.getNum_vip()))) &&
            ((this.nom_vip==null && other.getNom_vip()==null) || 
             (this.nom_vip!=null &&
              this.nom_vip.equals(other.getNom_vip()))) &&
            ((this.tel_vip==null && other.getTel_vip()==null) || 
             (this.tel_vip!=null &&
              this.tel_vip.equals(other.getTel_vip()))) &&
            ((this.ema_vip==null && other.getEma_vip()==null) || 
             (this.ema_vip!=null &&
              this.ema_vip.equals(other.getEma_vip()))) &&
            ((this.fec_vip==null && other.getFec_vip()==null) || 
             (this.fec_vip!=null &&
              this.fec_vip.equals(other.getFec_vip()))) &&
            ((this.sal_vip==null && other.getSal_vip()==null) || 
             (this.sal_vip!=null &&
              this.sal_vip.equals(other.getSal_vip()))) &&
            ((this.fuc_vip==null && other.getFuc_vip()==null) || 
             (this.fuc_vip!=null &&
              this.fuc_vip.equals(other.getFuc_vip()))) &&
            ((this.muc_vip==null && other.getMuc_vip()==null) || 
             (this.muc_vip!=null &&
              this.muc_vip.equals(other.getMuc_vip()))) &&
            ((this.fup_vip==null && other.getFup_vip()==null) || 
             (this.fup_vip!=null &&
              this.fup_vip.equals(other.getFup_vip()))) &&
            ((this.mup_vip==null && other.getMup_vip()==null) || 
             (this.mup_vip!=null &&
              this.mup_vip.equals(other.getMup_vip()))) &&
            ((this.tnr_vip==null && other.getTnr_vip()==null) || 
             (this.tnr_vip!=null &&
              this.tnr_vip.equals(other.getTnr_vip()))) &&
            ((this.tmr_vip==null && other.getTmr_vip()==null) || 
             (this.tmr_vip!=null &&
              this.tmr_vip.equals(other.getTmr_vip()))) &&
            ((this.tct_vip==null && other.getTct_vip()==null) || 
             (this.tct_vip!=null &&
              this.tct_vip.equals(other.getTct_vip()))) &&
            ((this.pto_vip==null && other.getPto_vip()==null) || 
             (this.pto_vip!=null &&
              this.pto_vip.equals(other.getPto_vip()))) &&
            ((this.pva_vip==null && other.getPva_vip()==null) || 
             (this.pva_vip!=null &&
              this.pva_vip.equals(other.getPva_vip()))) &&
             ((this.datetime_vip==null && other.getDatetime_vip()==null) || 
                      (this.datetime_vip!=null &&
                       this.datetime_vip.equals(other.getDatetime_vip())));
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
        if (getNom_vip() != null) {
            _hashCode += getNom_vip().hashCode();
        }
        if (getTel_vip() != null) {
            _hashCode += getTel_vip().hashCode();
        }
        if (getEma_vip() != null) {
            _hashCode += getEma_vip().hashCode();
        }
        if (getFec_vip() != null) {
            _hashCode += getFec_vip().hashCode();
        }
        if (getSal_vip() != null) {
            _hashCode += getSal_vip().hashCode();
        }
        if (getFuc_vip() != null) {
            _hashCode += getFuc_vip().hashCode();
        }
        if (getMuc_vip() != null) {
            _hashCode += getMuc_vip().hashCode();
        }
        if (getFup_vip() != null) {
            _hashCode += getFup_vip().hashCode();
        }
        if (getMup_vip() != null) {
            _hashCode += getMup_vip().hashCode();
        }
        if (getTnr_vip() != null) {
            _hashCode += getTnr_vip().hashCode();
        }
        if (getTmr_vip() != null) {
            _hashCode += getTmr_vip().hashCode();
        }
        if (getTct_vip() != null) {
            _hashCode += getTct_vip().hashCode();
        }
        if (getPto_vip() != null) {
            _hashCode += getPto_vip().hashCode();
        }
        if (getPva_vip() != null) {
            _hashCode += getPva_vip().hashCode();
        }       
        if (getDatetime_vip() != null) {
            _hashCode += getDatetime_vip().hashCode();
        }
        __hashCodeCalc = false;
        return _hashCode;
    }

    // Type metadata
    private static org.apache.axis.description.TypeDesc typeDesc =
        new org.apache.axis.description.TypeDesc(ClientesVip.class, true);

    static {
        typeDesc.setXmlType(new javax.xml.namespace.QName("http://realtoscana.com/WS_SirloinClients", "clientesVip"));
        org.apache.axis.description.ElementDesc elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("num_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "num_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "integer"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("nom_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "nom_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("tel_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "tel_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("ema_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "ema_vip"));
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
        elemField.setFieldName("sal_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "sal_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("fuc_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "fuc_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "date"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("muc_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "muc_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("fup_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "fup_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "date"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("mup_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "mup_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("tnr_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "tnr_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "integer"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("tmr_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "tmr_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("tct_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "tct_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("pto_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "pto_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("pva_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "pva_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "decimal"));
        elemField.setNillable(true);
        typeDesc.addFieldDesc(elemField);
        elemField = new org.apache.axis.description.ElementDesc();
        elemField.setFieldName("datetime_vip");
        elemField.setXmlName(new javax.xml.namespace.QName("", "datetime_vip"));
        elemField.setXmlType(new javax.xml.namespace.QName("http://www.w3.org/2001/XMLSchema", "string"));
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
    public static org.apache.axis.encoding.Serializer getSerializer(
           java.lang.String mechType, 
           java.lang.Class _javaType,  
           javax.xml.namespace.QName _xmlType) {
        return 
          new  org.apache.axis.encoding.ser.BeanSerializer(
            _javaType, _xmlType, typeDesc);
    }

    /**
     * Get Custom Deserializer
     */
    public static org.apache.axis.encoding.Deserializer getDeserializer(
           java.lang.String mechType, 
           java.lang.Class _javaType,  
           javax.xml.namespace.QName _xmlType) {
        return 
          new  org.apache.axis.encoding.ser.BeanDeserializer(
            _javaType, _xmlType, typeDesc);
    }

	

}
