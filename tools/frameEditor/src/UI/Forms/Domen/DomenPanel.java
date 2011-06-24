package UI.Forms.Domen;

import logic.product.Domen;
import logic.product.Value;
import logic.frames.Frameset;
import UI.Forms.Value.ValueTable;
import UI.Forms.Value.ValueDialog;
import UI.Forms.Value.ValueTableModel;
import java.awt.BorderLayout;
import java.awt.Component;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import javax.swing.BorderFactory;
import javax.swing.DropMode;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.ListSelectionModel;
import javax.swing.event.ListSelectionEvent;
import javax.swing.event.ListSelectionListener;

public class DomenPanel extends javax.swing.JPanel
{

  /** Creates new form NewJPanel */
  public DomenPanel()
  {
    initComponents();
    myInitComponents();
  }

  private void myInitComponents()
  {
    jTableDomain.getSelectionModel().addListSelectionListener(new ListSelectionListener()
    {

      @Override
      public void valueChanged(ListSelectionEvent e)
      {
        ((ValueTableModel) jTableValue.getModel()).setDataList(getCurrentDomen());
        updateDomainButtons();
        updateValueButtons();
      }
    });
    jTableDomain.setDropMode(DropMode.INSERT_ROWS);
    jTableValue.setDropMode(DropMode.INSERT_ROWS);
    jTableDomain.setTableHeader(null);
    jTableValue.setTableHeader(null);
  }

  /** This method is called from within the constructor to
   * initialize the form.
   * WARNING: Do NOT modify this code. The content of this method is
   * always regenerated by the Form Editor.
   */
  @SuppressWarnings("unchecked")
  // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
  private void initComponents() {

    jPanel2 = new JPanel();
    jPanel4 = new JPanel();
    jScrollPane1 = new JScrollPane();
    jTableDomain = new DomenTable();
    jPanel5 = new JPanel();
    jButtonDomainAdd = new JButton();
    jButtonDomainEdit = new JButton();
    jButtonDomainDelete = new JButton();
    jPanel3 = new JPanel();
    jPanel6 = new JPanel();
    jScrollPane2 = new JScrollPane();
    jTableValue = new ValueTable();
    jPanel7 = new JPanel();
    jButtonValueAdd = new JButton();
    jButtonValueEdit = new JButton();
    jButtonValueDelete = new JButton();

    setPreferredSize(new Dimension(768, 576));
    setLayout(new GridLayout(1, 2));

    jPanel2.setBorder(BorderFactory.createTitledBorder("Домены"));
    jPanel2.setLayout(new BorderLayout());

    jPanel4.setLayout(new GridLayout(1, 1));

    jScrollPane1.setAutoscrolls(true);

    jTableDomain.setModel(new DomenTableModel());
    jTableDomain.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
    jTableDomain.getTableHeader().setReorderingAllowed(false);
    jTableDomain.addKeyListener(new KeyAdapter() {
      public void keyPressed(KeyEvent evt) {
        jTableDomainKeyPressed(evt);
      }
    });
    jScrollPane1.setViewportView(jTableDomain);

    jPanel4.add(jScrollPane1);

    jPanel2.add(jPanel4, BorderLayout.CENTER);

    jButtonDomainAdd.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/add.png"))); // NOI18N
    jButtonDomainAdd.setText("Добавить");
    jButtonDomainAdd.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonDomainAddActionPerformed(evt);
      }
    });
    jPanel5.add(jButtonDomainAdd);

    jButtonDomainEdit.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/edit.png"))); // NOI18N
    jButtonDomainEdit.setText("Изменить");
    jButtonDomainEdit.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonDomainEditActionPerformed(evt);
      }
    });
    jPanel5.add(jButtonDomainEdit);

    jButtonDomainDelete.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/remove.png"))); // NOI18N
    jButtonDomainDelete.setText("Удалить");
    jButtonDomainDelete.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonDomainDeleteActionPerformed(evt);
      }
    });
    jPanel5.add(jButtonDomainDelete);

    jPanel2.add(jPanel5, BorderLayout.SOUTH);

    add(jPanel2);

    jPanel3.setBorder(BorderFactory.createTitledBorder("Значения"));
    jPanel3.setLayout(new BorderLayout());

    jPanel6.setLayout(new GridLayout(1, 1));

    jScrollPane2.setAutoscrolls(true);

    jTableValue.setModel(new ValueTableModel());
    jTableValue.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
    jTableValue.getTableHeader().setReorderingAllowed(false);
    jTableValue.addKeyListener(new KeyAdapter() {
      public void keyPressed(KeyEvent evt) {
        jTableValueKeyPressed(evt);
      }
    });
    jScrollPane2.setViewportView(jTableValue);

    jPanel6.add(jScrollPane2);

    jPanel3.add(jPanel6, BorderLayout.CENTER);

    jButtonValueAdd.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/add.png"))); // NOI18N
    jButtonValueAdd.setText("Добавить");
    jButtonValueAdd.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonValueAddActionPerformed(evt);
      }
    });
    jPanel7.add(jButtonValueAdd);

    jButtonValueEdit.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/edit.png"))); // NOI18N
    jButtonValueEdit.setText("Изменить");
    jButtonValueEdit.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonValueEditActionPerformed(evt);
      }
    });
    jPanel7.add(jButtonValueEdit);

    jButtonValueDelete.setIcon(new ImageIcon(getClass().getResource("/Images/16x16/remove.png"))); // NOI18N
    jButtonValueDelete.setText("Удалить");
    jButtonValueDelete.addActionListener(new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        jButtonValueDeleteActionPerformed(evt);
      }
    });
    jPanel7.add(jButtonValueDelete);

    jPanel3.add(jPanel7, BorderLayout.SOUTH);

    add(jPanel3);
  }// </editor-fold>//GEN-END:initComponents

    private void jTableDomainKeyPressed(KeyEvent evt) {//GEN-FIRST:event_jTableDomainKeyPressed
      if (evt.getKeyCode() == KeyEvent.VK_DELETE && jTableDomain.getSelectedRowCount() == 1)
      {
        jButtonDomainDeleteActionPerformed(null);
      }
      if (evt.getKeyCode() == KeyEvent.VK_ENTER && evt.isControlDown())
      {
        jButtonDomainAddActionPerformed(null);
      }
}//GEN-LAST:event_jTableDomainKeyPressed

    private void jButtonDomainAddActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonDomainAddActionPerformed
      DomenDialog dd = new DomenDialog((java.awt.Frame) getMainFrame(), true);
      dd.run("Добавление домена", null /*, scratchpad*/);
      ((DomenTableModel) jTableDomain.getModel()).fireTableDataChanged();
      final int lastRow = jTableDomain.getRowCount() - 1;
      if (lastRow > -1)
      {
        jTableDomain.setRowSelectionInterval(lastRow, lastRow);
        jTableDomain.requestFocusInWindow();
      }
      updateDomainButtons();
}//GEN-LAST:event_jButtonDomainAddActionPerformed

    private void jButtonDomainEditActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonDomainEditActionPerformed
      if (jTableDomain.getSelectedRowCount() == 0)
      {
        showError("Вы должны выбрать домен перед изменением");
        return;
      }
      int row = jTableDomain.getSelectedRow();
      row = jTableDomain.convertRowIndexToModel(row);
      Domen domen = (Domen) ((DomenTableModel) jTableDomain.getModel()).getValueAt(row, 0);
      DomenDialog dd = new DomenDialog((java.awt.Frame) getMainFrame(), true);
      dd.run("Изменение домена", domen /*, scratchpad*/);
      ((DomenTableModel) jTableDomain.getModel()).fireTableDataChanged();
      jTableDomain.setRowSelectionInterval(row, row);
      jTableDomain.requestFocusInWindow();
      updateDomainButtons();
}//GEN-LAST:event_jButtonDomainEditActionPerformed

  private Component getMainFrame()
  {
    Component c = getParent();
    while (true)
    {
      if (c instanceof JFrame)
      {
        return c;
      } else
      {
        c = c.getParent();
      }
    }
  }
    private void jButtonDomainDeleteActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonDomainDeleteActionPerformed
      if (jTableDomain.getSelectedRowCount() == 0)
      {
        showError("Вы должны выбрать домен перед удалением");
        return;
      }
      int row = jTableDomain.getSelectedRow();
      row = jTableDomain.convertRowIndexToModel(row);
      Domen domen = (Domen) ((DomenTableModel) jTableDomain.getModel()).getValueAt(row, 0);
      int res = JOptionPane.showConfirmDialog(this, "Домен будет удален. "
              + "Вы уверены?", "Подтверждение удаления",
              JOptionPane.YES_NO_OPTION, JOptionPane.WARNING_MESSAGE);
      if (res == JOptionPane.YES_OPTION)
      {
        if (!Frameset.getInstance().removeDomen(domen))
        {
          showError("Данный домен используется одним или несколькими "
                  + "слотами. Удаление невозможно");
          return;
        }
        ((DomenTableModel) jTableDomain.getModel()).fireTableDataChanged();
        int rowCount = jTableDomain.getRowCount();
        int rowToSelect = row == rowCount ? rowCount - 1 : row;
        if (rowToSelect > -1)
        {
          jTableDomain.setRowSelectionInterval(rowToSelect, rowToSelect);
          jTableDomain.requestFocusInWindow();
        }
        updateDomainButtons();
      }
}//GEN-LAST:event_jButtonDomainDeleteActionPerformed

    private void jTableValueKeyPressed(KeyEvent evt) {//GEN-FIRST:event_jTableValueKeyPressed
      if (evt.getKeyCode() == KeyEvent.VK_DELETE && jTableDomain.getSelectedRowCount() == 1)
      {
        jButtonValueDeleteActionPerformed(null);
      }
      if (evt.getKeyCode() == KeyEvent.VK_ENTER && evt.isControlDown())
      {
        jButtonValueAddActionPerformed(null);
      }
}//GEN-LAST:event_jTableValueKeyPressed

    private void jButtonValueAddActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonValueAddActionPerformed
      ValueDialog vd = new ValueDialog((java.awt.Frame) getMainFrame(), true);
      int row = jTableDomain.getSelectedRow();
      row = jTableDomain.convertRowIndexToModel(row);
      Domen domen = (Domen) jTableDomain.getModel().getValueAt(row, 0);
      vd.run("Добавление значения", null, domen);
      ((ValueTableModel) jTableValue.getModel()).fireTableDataChanged();
      int lastRow = jTableValue.getRowCount() - 1;
      jTableValue.setRowSelectionInterval(lastRow, lastRow);
      jTableValue.requestFocusInWindow();
      updateValueButtons();
}//GEN-LAST:event_jButtonValueAddActionPerformed

    private void jButtonValueEditActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonValueEditActionPerformed
      if (jTableValue.getSelectedRowCount() == 0)
      {
        showError("Вы должны выбрать значение перед изменением");
        return;
      }

      Domen domen = getCurrentDomen();
      int row = jTableValue.getSelectedRow();
      Value value = getCurrentValue();

      ValueDialog vd = new ValueDialog((java.awt.Frame) getMainFrame(), true);
      vd.run("Изменение значения", value, domen);
      ((ValueTableModel) jTableValue.getModel()).fireTableDataChanged();
      jTableValue.setRowSelectionInterval(row, row);
      jTableValue.requestFocusInWindow();
}//GEN-LAST:event_jButtonValueEditActionPerformed

    private void jButtonValueDeleteActionPerformed(ActionEvent evt) {//GEN-FIRST:event_jButtonValueDeleteActionPerformed
      if (jTableValue.getSelectedRowCount() == 0)
      {
        showError("Вы должны выбрать значение перед удалением");
        return;
      }
      int row = jTableValue.getSelectedRow();
      Value value = getCurrentValue();
      int res = JOptionPane.showConfirmDialog(this, "Значение"
              + " будет удалено. Вы уверены?", "Подтверждение удаления",
              JOptionPane.YES_NO_OPTION, JOptionPane.WARNING_MESSAGE);
      if (res == JOptionPane.YES_OPTION)
      {
        if (!value.getDomen().removeValue(value))
        {
          showError("Данное значение используется одним или несколькими "
                  + "слотами. Удаление невозможно");
          return;
        }
        ((ValueTableModel) jTableValue.getModel()).fireTableDataChanged();
        int rowCount = jTableValue.getRowCount();
        int rowToSelect = row == rowCount ? rowCount - 1 : row;
        if (rowToSelect > -1)
        {
          jTableValue.setRowSelectionInterval(rowToSelect, rowToSelect);
          jTableValue.requestFocusInWindow();
        }
        updateValueButtons();
      }
}//GEN-LAST:event_jButtonValueDeleteActionPerformed

  private void updateValueButtons()
  {
    if (jTableDomain.getSelectedRowCount() == 1)
    {
      jButtonValueAdd.setEnabled(true);
      boolean b = !(jTableValue.getRowCount() == 0);
      jButtonValueEdit.setEnabled(b);
      jButtonValueDelete.setEnabled(b);
      if (b)
      {
        jTableValue.setRowSelectionInterval(0, 0);
      }
    } else
    {
      jButtonValueAdd.setEnabled(false);
      jButtonValueEdit.setEnabled(false);
      jButtonValueDelete.setEnabled(false);
    }
  }

  private void updateDomainButtons()
  {
    jButtonDomainEdit.setEnabled(jTableDomain.getSelectedRowCount() == 1);
    jButtonDomainDelete.setEnabled(jTableDomain.getSelectedRowCount() == 1);
  }

  public Domen getCurrentDomen()
  {
    int row = jTableDomain.getSelectedRow();
    row = jTableDomain.convertRowIndexToModel(row);
    if (row != -1)
    {
      return (Domen) jTableDomain.getModel().getValueAt(row, 0);
    } else
    {
      return null;
    }
  }

  private void showError(String msg)
  {
    JOptionPane.showMessageDialog(this, msg, "Ошибка",
            JOptionPane.ERROR_MESSAGE);
  }

  public Value getCurrentValue()
  {
    int row = jTableValue.getSelectedRow();
    row = jTableValue.convertRowIndexToModel(row);
    return (Value) jTableValue.getModel().getValueAt(row, 0);
  }

  public void refresh()
  {
    ((DomenTableModel) jTableDomain.getModel()).fireTableDataChanged();
    ((ValueTableModel) jTableValue.getModel()).fireTableDataChanged();
    updateDomainButtons();
    updateValueButtons();
  }

  public void selectDomen(Domen domen)
  {
    int row = Frameset.getInstance().indexOfDomen(domen);
    if (row > -1)
    {
      jTableDomain.setRowSelectionInterval(row, row);
      jTableDomain.requestFocusInWindow();
    }
  }

  public void selectValue(Value value)
  {
    Domen domen = getCurrentDomen();
    int row = domen != null ? domen.getValues().indexOf(value) : -1;
    if (row > -1)
    {
      jTableValue.setRowSelectionInterval(row, row);
      jTableValue.requestFocusInWindow();
    }
  }
  
  // Variables declaration - do not modify//GEN-BEGIN:variables
  private JButton jButtonDomainAdd;
  private JButton jButtonDomainDelete;
  private JButton jButtonDomainEdit;
  private JButton jButtonValueAdd;
  private JButton jButtonValueDelete;
  private JButton jButtonValueEdit;
  private JPanel jPanel2;
  private JPanel jPanel3;
  private JPanel jPanel4;
  private JPanel jPanel5;
  private JPanel jPanel6;
  private JPanel jPanel7;
  private JScrollPane jScrollPane1;
  private JScrollPane jScrollPane2;
  private JTable jTableDomain;
  private JTable jTableValue;
  // End of variables declaration//GEN-END:variables
}
