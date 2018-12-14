class CreateTransactions < ActiveRecord::Migration[5.1]
  def change
    create_table :transactions do |t|
      t.string :name
      t.float :price
      t.string :category
      t.string :condition
      t.text :description
      t.string :picture
      t.integer :item
      t.belongs_to :user, foreign_key: true

      t.timestamps
    end
  end
end
