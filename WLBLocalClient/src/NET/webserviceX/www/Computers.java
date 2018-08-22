/**
 * Computers.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package NET.webserviceX.www;

public class Computers implements java.io.Serializable {
    private java.lang.String _value_;
    private static java.util.HashMap _table_ = new java.util.HashMap();

    // Constructor
    protected Computers(java.lang.String value) {
        _value_ = value;
        _table_.put(_value_,this);
    }

    public static final java.lang.String _Bit = "Bit";
    public static final java.lang.String _Byte = "Byte";
    public static final java.lang.String _Kilobyte = "Kilobyte";
    public static final java.lang.String _Megabyte = "Megabyte";
    public static final java.lang.String _Gigabyte = "Gigabyte";
    public static final java.lang.String _Terabyte = "Terabyte";
    public static final java.lang.String _Petabyte = "Petabyte";
    public static final Computers Bit = new Computers(_Bit);
    public static final Computers Byte = new Computers(_Byte);
    public static final Computers Kilobyte = new Computers(_Kilobyte);
    public static final Computers Megabyte = new Computers(_Megabyte);
    public static final Computers Gigabyte = new Computers(_Gigabyte);
    public static final Computers Terabyte = new Computers(_Terabyte);
    public static final Computers Petabyte = new Computers(_Petabyte);
    public java.lang.String getValue() { return _value_;}
    public static Computers fromValue(java.lang.String value)
          throws java.lang.IllegalArgumentException {
        Computers enumeration = (Computers)
            _table_.get(value);
        if (enumeration==null) throw new java.lang.IllegalArgumentException();
        return enumeration;
    }
    public static Computers fromString(java.lang.String value)
          throws java.lang.IllegalArgumentException {
        return fromValue(value);
    }
    public boolean equals(java.lang.Object obj) {return (obj == this);}
    public int hashCode() { return toString().hashCode();}
    public java.lang.String toString() { return _value_;}
    public java.lang.Object readResolve() throws java.io.ObjectStreamException { return fromValue(_value_);}
    public static org.apache.axis.encoding.Serializer getSerializer(
           java.lang.String mechType, 
           java.lang.Class _javaType,  
           javax.xml.namespace.QName _xmlType) {
        return 
          new org.apache.axis.encoding.ser.EnumSerializer(
            _javaType, _xmlType);
    }
    public static org.apache.axis.encoding.Deserializer getDeserializer(
           java.lang.String mechType, 
           java.lang.Class _javaType,  
           javax.xml.namespace.QName _xmlType) {
        return 
          new org.apache.axis.encoding.ser.EnumDeserializer(
            _javaType, _xmlType);
    }
    // Type metadata
    private static org.apache.axis.description.TypeDesc typeDesc =
        new org.apache.axis.description.TypeDesc(Computers.class);

    static {
        typeDesc.setXmlType(new javax.xml.namespace.QName("http://www.webserviceX.NET/", "Computers"));
    }
    /**
     * Return type metadata object
     */
    public static org.apache.axis.description.TypeDesc getTypeDesc() {
        return typeDesc;
    }

}
