class EmployeesController < ApplicationController

  # http_basic_authenticate_with name: "dhh", password: "secret", except: [:index, :show]

  before_action :authenticate_user!

  def index
    @employees = Employees.paginate(:page => params[:page])
  end

  def show
    @employee = Employees.find(params[:id])
  end

  def new
    @employee = Employees.new
  end

  def edit
    @employee = Employees.find(params[:id])
  end

  def create
    @employee = Employees.new(employee_params)

    if @employee.save
      redirect_to @employee
    else
      render 'new'
    end
  end

  def update
    @employee = Employees.find(params[:id])

    if @employee.update(employee_params)
      redirect_to @employee
    else
      render 'edit'
    end
  end

  def destroy
    @employee = Employees.find(params[:id])
    @employee.destroy

    redirect_to employees_path
  end

  private
  def employee_params
    params.require(:employee).permit(:emp_no, :birth_date, :first_name, :last_name,:gender, :hire_date)
  end

end
