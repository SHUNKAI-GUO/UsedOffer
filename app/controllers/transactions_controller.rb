class TransactionsController < ApplicationController
  before_action :set_transaction, only: [:show, :edit, :update, :destroy]

  # GET /transactions
  # GET /transactions.json
  def index
    @transactions = current_user.transactions
  end

  # GET /transactions/1
  # GET /transactions/1.json
  def show
    @transaction = Transaction.find(params[:id])
  end

  # GET /transactions/new
  def new
    @transaction = Transaction.new
  end

  # GET /transactions/1/edit
  def edit
  end

  # POST /transactions
  # POST /transactions.json
  def create
    @transaction = current_user.transactions.build(transaction_params)
    @transaction.save
  end

  def updateTransaction
    current_user.carts.each do |c|
      Item.where(id: c.item.to_i).update_all(availability: 'Sold')
      transaction = Transaction.create(
        :name => c.name, 
        :price => c.price, 
        :category => c.category, 
        :condition => c.condition, 
        :description => c.description, 
        :picture => c.picture, 
        :item => c.item,
        :user => current_user
      )
      transaction.save
    end
    current_user.carts.destroy_all
    @transactions = current_user.transactions
    render :index
  end

  # PATCH/PUT /transactions/1
  # PATCH/PUT /transactions/1.json
  def update
    respond_to do |format|
      if @transaction.update(transaction_params)
        format.html { redirect_to @transaction, notice: 'Transaction was successfully updated.' }
        format.json { render :show, status: :ok, location: @transaction }
      else
        format.html { render :edit }
        format.json { render json: @transaction.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /transactions/1
  # DELETE /transactions/1.json
  def destroy
    @transaction.destroy
    respond_to do |format|
      format.html { redirect_to transactions_url, notice: 'Transaction was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  def checkout
    current_user.carts.each do |cartItem|
      Item.where(id: cartItem.item.to_i).update_all(availability: 'Sold')
      @transaction = current_user.transactions.build({:name => cartItem.name, :price => cartItem.price, :category => cartItem.category, :description => cartItem.description, :picture => cartItem.picture})
    end
    current_user.carts.destroy_all
    @transactions = current_user.transactions
    render :index
  end


  def oneclick
    current_user.carts.each do |cartItem|
      Item.where(id: cartItem.item.to_i).update_all(availability: 'Sold')
      @transaction = current_user.transactions.build({:name => cartItem.name, :price => cartItem.price, :category => cartItem.category, :description => cartItem.description, :picture => cartItem.picture})
    end
    current_user.carts.destroy_all
    @transactions = current_user.transactions
    render :index
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_transaction
      @transaction = Transaction.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def transaction_params
      params.permit(:name, :price, :category, :condition, :description, :picture, :item, :user_id)
    end
end
