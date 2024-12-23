public class ComplexNum<T extends Number> {
    private T real;
    private T imaginary;

    public ComplexNum(T real, T imaginary) {
        this.real = real;
        this.imaginary = imaginary;
    }

    public ComplexNum() {
        this.real = 0;
        this.imaginary = 0;
    }

    public T getReal() {
        return real;
    }

    public T getImaginary() {
        return imaginary;
    }

    public void setReal(T real) {
        this.real = real;
    }

    public void setImaginary(T imaginary) {
        this.imaginary = imaginary;
    }

    public ComplexNum<Double> add(ComplexNum<T> other) {
        double newReal = (this.real.doubleValue() + other.real.doubleValue());
        double newImaginary = (this.imaginary.doubleValue() + other.imaginary.doubleValue());

        ComplexNum C = new ComplexNum<Double>(newReal, newImaginary);
        return C;
    }

    public ComplexNum<Double> subtract(ComplexNum<T> other) {
        double newReal = (this.real.doubleValue() - other.real.doubleValue());
        double newImaginary = (this.imaginary.doubleValue() - other.imaginary.doubleValue());

        ComplexNum C = new ComplexNum<Double>(newReal, newImaginary);
        return C;
    }

    public ComplexNum<Double> multiply(ComplexNum<T> other) {
        double newReal = (this.real.doubleValue() * other.real.doubleValue()
                - this.imaginary.doubleValue() * other.imaginary.doubleValue());
        double newImaginary = (this.real.doubleValue() * other.imaginary.doubleValue()
                + this.imaginary.doubleValue() * other.real.doubleValue());

        ComplexNum C = new ComplexNum<Double>(newReal, newImaginary);
        return C;
    }
}
